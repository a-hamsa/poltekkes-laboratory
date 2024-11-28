<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentList;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentListClinic extends Controller
{
    //
    public function index(Request $request)
    {
        // Create an array of the tables you want to query
        $tables = [
            'student_list_for_d3_t1',
            'student_list_for_d3_t2',
            'student_list_for_d4_t1',
            'student_list_for_d4_t2',
            'student_list_for_d4_t3',
        ];

        // Initialize the query builder for all tables
        $query = DB::table($tables[$request->tk_smt ?? 0]);

        // Loop through the tables and union the results
        foreach (array_slice($tables, 1) as $table) {
            $query->union(DB::table($table));
        }

        // Apply filters if they are set
        if ($request->has('class') && $request->class) {
            $query->where('class', $request->class);
        }

        // Paginate the results (make sure pagination works across unioned queries)
        $students = $query->paginate(50);

        // Get distinct values for class and tk_smt (you can do this per table or for the unioned results)
        $classes = DB::table($tables[0])->select('class')->distinct()->pluck('class');
        $tk_smt_list = collect();
        for($i=0;$i<5;$i++){
            $tk_smt = DB::table($tables[$i])->select('tk_smt')->distinct()->pluck('tk_smt');
            $tk_smt_list = $tk_smt_list->merge($tk_smt);
        }

        // Store header in session
        session()->put('header', 'Daftar Nama Siswa');

        // Return the view with necessary data
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
        // dd($request);
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
            'table' => 'required|in:student_list_for_d3_t1,student_list_for_d3_t2,student_list_for_d4_t1,student_list_for_d4_t2,student_list_for_d4_t3',
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
