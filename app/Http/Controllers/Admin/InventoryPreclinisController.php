<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryPreClinic;
use Illuminate\Http\Request;

class InventoryPreclinisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = InventoryPreClinic::all();

        session()->put('header', 'Daftar Inventaris Pre-Klinik');
        return view('preclinic.invent', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->put('header', 'Tambah Inventaris Baru');
        return view('preclinic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|integer',
            'condition' => 'required|in:Berfungsi,Rusak',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $inventory = new InventoryPreClinic();
        $inventory->name = $request->input('name');
        $inventory->amount = $request->input('amount');
        $inventory->condition = $request->input('condition');
        $inventory->image = $request->file('image')->store('pre-inventory', 'public');

        $inventory->save();

        return redirect()->route('preinventory.index')->with('success', 'Inventory created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = InventoryPreClinic::find($id);

        session()->put('header', 'Update Inventaris');
        return view('preclinic.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|integer',
            'condition' => 'required|in:good,broken',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $inventory = InventoryPreClinic::find($id);
        $inventory->name = $request->input('name');
        $inventory->amount = $request->input('amount');
        $inventory->condition = $request->input('condition');
        if ($request->hasFile('image')) {
            $inventory->image = $request->file('image')->store('inventory', 'public');
        }

        $inventory->save();

        return redirect()->route('preinventory.index')->with('success', 'Inventory updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = InventoryPreClinic::find($id);
        $inventory->delete();

        return redirect()->route('preinventory.index')->with('success', 'Inventory deleted successfully!');
    }
}
