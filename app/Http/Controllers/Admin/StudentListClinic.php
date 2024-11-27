<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentList;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentListClinic extends Controller
{
    //
    public function index(Request $request)
    {
        $query = StudentList::query();

        // Apply filters
        if ($request->has('class') && $request->class) {
            $query->where('class', $request->class);
        }
        if ($request->has('tk_smt') && $request->tk_smt) {
            $query->where('tk_smt', $request->tk_smt);
        }
    
        // Paginate the results
        $students = $query->paginate(50);
    
        // Pass filters for the form
        $classes = StudentList::select('class')->distinct()->pluck('class');
        $tk_smt_list = StudentList::select('tk_smt')->distinct()->pluck('tk_smt');
        session()->put('header', 'Daftar Nama Siswa');
    
        return view('clinic.student', compact('students', 'classes', 'tk_smt_list'));

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
            'tk_smt' => 'required',
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
            'tk_smt' => 'required',
        ]);

        $students = StudentList::find($id);
        $students->name = $request->input('name');
        $students->nim = $request->input('nim');
        $students->class = $request->input('class');
        $students->tk_smt = $request->input('tk_smt');

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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new StudentsImport, $request->file('file'));

        return back()->with('success', 'Students imported successfully!');
    }
}
