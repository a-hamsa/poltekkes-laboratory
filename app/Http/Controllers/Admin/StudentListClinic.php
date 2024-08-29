<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentList;
use Illuminate\Http\Request;

class StudentListClinic extends Controller
{
    //
    public function index()
    {
        $students = StudentList::all();
        session()->put('header', 'Daftar Nama Siswa');
        return view('clinic.student', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->put('header', 'Tambah Siswa Baru');
        return view('clinic.createstudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'class' => 'required',
        ]);

        $students = new StudentList();
        $students->name = $request->input('name');
        $students->nim = $request->input('nim');
        $students->class = $request->input('class');

        $students->save();

        return redirect()->route('student.index')->with('success', 'Student created successfully!');
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
        $student = StudentList::find($id);

        session()->put('header', 'Update Student');
        return view('clinic.editstudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'class' => 'required',
        ]);

        $students = StudentList::find($id);
        $students->name = $request->input('name');
        $students->nim = $request->input('nim');
        $students->class = $request->input('class');

        $students->save();

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = StudentList::find($id);
        $students->delete();

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }
}
