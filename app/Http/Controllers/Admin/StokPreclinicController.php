<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StokPreclinic;
use Illuminate\Http\Request;

class StokPreclinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = StokPreclinic::all();

        session()->put('header', 'Stok Bahan Habis Pakai');
        return view('preclinic.stok', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->put('header', 'Tambah Stok Bahan Baru');
        return view('preclinic.createstok');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|integer',
            'description' => 'required',
        ]);

        $stok = new StokPreclinic();
        $stok->name = $request->input('name');
        $stok->amount = $request->input('amount');
        $stok->description = $request->input('description');

        $stok->save();

        return redirect()->route('prestok.index')->with('success', 'Stok created successfully!');
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
        $stok = StokPreclinic::find($id);

        session()->put('header', 'Update Stok');
        return view('preclinic.editstok', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|integer',
            'description' => 'required',
        ]);

        $stok = StokPreclinic::find($id);
        $stok->name = $request->input('name');
        $stok->amount = $request->input('amount');
        $stok->description = $request->input('description');

        $stok->save();

        return redirect()->route('prestok.index')->with('success', 'Inventory updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stok = StokPreclinic::find($id);
        $stok->delete();

        return redirect()->route('prestok.index')->with('success', 'Inventory deleted successfully!');
    }
}
