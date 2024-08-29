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
    public function index(){

        $absensi = AbsensiClinic::select('name', 'semester', 'created_at')
        ->get()
        ->groupBy('semester')
        ->map(function ($semesterGroup) {
            return $semesterGroup->groupBy('name')->map(function ($userDates) {
                return $userDates->pluck('created_at')->map(function ($date) {
                    return $date->format('Y-m-d');
                });
            });
        });

        $uniqueDates = AbsensiClinic::selectRaw('DATE(created_at) as date')
        ->distinct()
        ->orderBy('date', 'asc') // Optional: to order the dates
        ->get()
        ->pluck('date'); // Extract the date column

        $semesters = Semester::all();

        return view('absensi.index', compact('absensi', 'uniqueDates', 'semesters'));
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
