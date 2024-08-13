<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryClinics;
use Illuminate\Http\Request;

class InventoryClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = InventoryClinics::all();
        return view('clinic.invent', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clinic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|integer',
            'condition' => 'required|in:good,broken',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $inventory = new InventoryClinics();
        $inventory->name = $request->input('name');
        $inventory->amount = $request->input('amount');
        $inventory->condition = $request->input('condition');
        $inventory->image = $request->file('image')->store('inventory', 'public');

        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'Inventory created successfully!');
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
        $inventory = InventoryClinics::find($id);
        return view('clinic.edit', compact('inventory'));
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

        $inventory = InventoryClinics::find($id);
        $inventory->name = $request->input('name');
        $inventory->amount = $request->input('amount');
        $inventory->condition = $request->input('condition');
        if ($request->hasFile('image')) {
            $inventory->image = $request->file('image')->store('inventory', 'public');
        }

        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = InventoryClinics::find($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory deleted successfully!');
    }
}
