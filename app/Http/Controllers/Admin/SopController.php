<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SopClinic;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function index()
    {
        $sop = SopClinic::all();

        session()->put('header', 'SOP dan Instruksi Kerja');
        return view('sop.index', compact('sop'));
    }

    public function create()
    {
        session()->put('header', 'Tambah SOP/Instruksi Kerja Baru');
        return view('sop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $sop = new SopClinic();
        $sop->name = $request->input('name');
        $sop->pdf_file = $request->file('pdf_file')->store('sop', 'public');

        $sop->save();

        return redirect()->route('sop.index')->with('success', 'Data created successfully!');
    }

    public function edit(string $id)
    {
        $sop = SopClinic::find($id);

        session()->put('header', 'Update SOP & IK');
        return view('sop.edit', compact('sop'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $sop = SopClinic::find($id);
        $sop->name = $request->input('name');
        if ($request->hasFile('pdf_file')) {
            $sop->pdf_file = $request->file('pdf_file')->store('sop', 'public');
        }

        $sop->save();

        return redirect()->route('sop.index')->with('success', 'Data updated successfully!');
    }

    public function destroy(string $id)
    {
        $sop = SopClinic::find($id);
        $sop->delete();

        return redirect()->route('sop.index')->with('success', 'Data deleted successfully!');
    }

}
