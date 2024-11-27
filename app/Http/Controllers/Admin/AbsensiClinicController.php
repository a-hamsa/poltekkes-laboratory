<?php

namespace App\Http\Controllers\Admin;

use App\Models\Semester;
use App\Models\StudentList;
use Illuminate\Http\Request;
use App\Models\AbsensiClinic;
use App\Http\Controllers\Controller;

class AbsensiClinicController extends Controller
{
    //
    public function index(Request $request){
        // Initialize the query for StudentList
        $query = StudentList::query();

        // Check if the user has selected a class and tk_smt filter
        if ($request->has('class') && $request->class) {
            $query->where('class', $request->class);
        } else {
            // If no class filter, default to 'A' class
            $query->where('class', 'A');
        }

        if ($request->has('tk_smt') && $request->tk_smt) {
            $query->where('tk_smt', $request->tk_smt);
        } else {
            // If no tk_smt filter, default to '1 1'
            $query->where('tk_smt', '1 (satu) / 1 (satu)');
        }

        // Paginate the results
        $students = $query->paginate(50);

        // Pass filters for the form
        $classes = StudentList::select('class')->distinct()->pluck('class');
        $tk_smt_list = StudentList::select('tk_smt')->distinct()->pluck('tk_smt');

        // Set session header
        session()->put('header', 'Rekap Absensi');

        // Return the view with the necessary data
        return view('absensi.index', compact('students', 'classes', 'tk_smt_list'));
    }

    public function storeSemester(Request $request){
        $request->validate([
            'semester' => 'required',
        ]);

        $semester = new Semester();
        $semester->semester = $request->input('semester');

        $semester->save();

        return redirect()->route('absensi.index')->with('success', 'Semester created successfully!');
    }

    public function destroySemester(Request $request, int $id){
        $semester = Semester::find($id);
        $semester->delete();

        return redirect()->route('absensi.index')->with('success', 'Student updated successfully!');

    }

    public function createAbsentStatus(Request $request) {
        $students = StudentList::all();
        $semesters = Semester::all();
        return view('absensi.create', compact('students','semesters'));
    }

    public function storeAbsentStatus(Request $request) {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'class' => 'required',
            'semester' => 'required',
            'absent_status' => 'required',
        ]);

        $absensi = new AbsensiClinic();
        $absensi->name =  $request->input('name');
        $absensi->nim =  $request->input('nim');
        $absensi->class =  $request->input('class');
        $absensi->semester = $request->input('semester');
        $absensi->absent_status =  $request->input('absent_status');

        $absensi->save();

        return redirect()->route('klinik')->with('success', 'Student updated successfully!');
    }
}
