<?php

namespace App\Http\Controllers\Admin;

use App\Models\Semester;
use App\Models\StudentList;
use Illuminate\Http\Request;
use App\Models\AbsensiClinic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class AbsensiClinicController extends Controller
{
    //
    public function index(Request $request)
{
    // Create an array of the tables you want to query
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

    // Fetch attendance data for relevant students
    $attendance = AbsensiClinic::whereIn('meet', [
        'pertemuan_1', 'pertemuan_2', 'pertemuan_3',
        'pertemuan_4', 'pertemuan_5', 'pertemuan_6',
        'pertemuan_7', 'pertemuan_8'
    ])->whereIn('nim', $students->pluck('nim'))
      ->get()
      ->groupBy('nim');

    // Prepare attendance data for each student
    $attendanceData = [];
    foreach ($students as $student) {
        $attendanceData[$student->nim] = [
            'name' => $student->name,
            'nim' => $student->nim,
            'attendance' => []
        ];

        // Loop through meetings to check attendance
        for ($meet = 1; $meet <= 8; $meet++) {
            $meeting = 'pertemuan_' . $meet;

            // Get the attendance record for the student and the meeting
            $status = $attendance->get($student->nim)?->firstWhere('meet', $meeting);

            // Add the attendance status or fallback to a default value
            $attendanceData[$student->nim]['attendance'][$meeting] = $status->absent_status ?? 'No Record';
        }
    }

    // Store header in session
    session()->put('header', 'Rekap Absensi');

    // Return the view with necessary data
    return view('absensi.index', compact('students', 'classes', 'attendanceData'));
}


    public function createAbsentStatus(Request $request) {
        return view('absensi.create');
    }

    public function updateAbsentStatus(Request $request) {
        
        $validated = $request->validate([
            'nim' => 'required|string',
            'meet' => 'required|string',
        ]);


        // Find the attendance record based on `nim` and `meet`
        $absensi = AbsensiClinic::where('nim', $request->nim)->where('meet', 'pertemuan_'.$request->meet)->first();
    
        if (!$absensi) {
            return redirect()->back()->withErrors('Attendance record not found.');
        }

        // Update the absent status
        $absensi->absent_status = 'Hadir';
        $absensi->save();
    
        return redirect()->route('absensi.index')->with('success', 'Student updated successfully!');
    }

    public function storeAbsentStatus(Request $request) {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'class' => 'required',
            'meet' => 'required',
            'room' => 'required',
            'absent_status' => 'required',
        ]);

        $absensi = new AbsensiClinic();
        $absensi->name =  $request->input('name');
        $absensi->nim =  $request->input('nim');
        $absensi->class =  $request->input('class');
        $absensi->meet =  $request->input('meet');
        $absensi->room =  $request->input('room');
        $absensi->absent_status =  $request->input('absent_status');

        $absensi->save();

        return redirect()->route('klinik')->with('success', 'Student updated successfully!');
    }
}
