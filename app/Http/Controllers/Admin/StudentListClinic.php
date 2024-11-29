<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentList;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentListClinic extends Controller
{
    //
    public function index(Request $request)
    {
        $tables = [
            'student_list_for_d3_t1',
            'student_list_for_d3_t2',
            'student_list_for_d3_t3',
            'student_list_for_d4_t1',
            'student_list_for_d4_t2',
            'student_list_for_d4_t3',
            'student_list_for_d4_t4',
        ];

        $tk_smt_index = $request->tk_smt ?? 0;

        // Start building the query from the selected table
        $query = DB::table($tables[$tk_smt_index]);

        // Apply filters for the selected table
        if ($request->has('class') && $request->class) {
            $query->where('class', $request->class);
        }

        // Get all results
        $studentsCollection = collect($query->get());

        // Pagination variables
        $perPage = 50;
        $currentPage = $request->input('page', 1); // Default to page 1 if no page is specified
        $currentPageItems = $studentsCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        // Create a paginator
        $students = new LengthAwarePaginator(
            $currentPageItems,
            $studentsCollection->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Collect class and tk_smt options
        $classes = collect();
        foreach ($tables as $table) {
            $classes = $classes->merge(DB::table($table)->select('class')->distinct()->pluck('class'));
        }
        $classes = $classes->unique()->values();

        session()->put('header', 'Daftar Nama Siswa');

        return view('clinic.student', compact('students', 'classes'));
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
        // dd($request);
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
            'table' => 'required|in:student_list_for_d3_t1,student_list_for_d3_t2,student_list_for_d3_t3,student_list_for_d4_t1,student_list_for_d4_t2,student_list_for_d4_t3,student_list_for_d4_t4',
        ]);

        // Identify the target table
        $table = $request->input('table');

        // Remove all existing data
        DB::table($table)->truncate();

        // Import new data
        \Excel::import(new StudentsImport($table), $request->file('file'));

        return back()->with('success', 'Students imported successfully!');
    }
}
