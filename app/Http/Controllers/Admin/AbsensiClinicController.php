<?php

namespace App\Http\Controllers\Admin;

use App\Models\Semester;
use App\Models\StudentList;
use Illuminate\Http\Request;
use App\Models\AbsensiClinic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AbsensiClinicController extends Controller
{
    //
    public function index(Request $request){
        // Create an array of the tables you want to query
        $tables = [
            'student_list_for_d3_t1',
            'student_list_for_d3_t2',
            'student_list_for_d4_t1',
            'student_list_for_d4_t2',
            'student_list_for_d4_t3',
        ];

        // Initialize the query builder for all tables
        $query = DB::table($tables[($request->tk_smt) ? $request->tk_smt : 0]);

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

        $attendance = AbsensiClinic::whereIn('meet', ['pertemuan_1', 'pertemuan_2', 'pertemuan_3', 'pertemuan_4', 'pertemuan_5', 'pertemuan_6', 'pertemuan_7', 'pertemuan_8'])
                            ->whereIn('nim', $students->pluck('nim'))
                            ->get()
                            ->groupBy('nim');

        // Format the data so that it's easier to work with in the view
        $attendanceData = [];
        foreach ($students as $student) {
            $attendanceData[$student->nim] = [
                'name' => $student->name,
                'nim' => $student->nim,
                'attendance' => []
            ];
            // Add the attendance status for each meeting (pertemuan_1 to pertemuan_8)
            for ($meet = 1; $meet <= 8; $meet++) {
                $meeting = 'pertemuan_' . $meet;

                // Get the attendance data for the student and meeting
                $status = $attendance->get($student->nim);
                
                // Check if attendance data exists for the student
                if ($status) {
                    // Find the first match for the current meeting
                    $status = $status->firstWhere('meet', $meeting);
                }

                // Only add attendance if status is not null or 'N/A'
                if ($status && $status->absent_status !== null && $status->absent_status !== 'N/A') {
                    $attendanceData[$student->nim]['attendance'][$meeting] = $status->absent_status;
                } else {
                    $attendanceData[$student->nim]['attendance'][$meeting] = 'No Record'; // Or 'Absent' or any other placeholder
                }
            }
        }
        // dd($attendanceData);

        // Store header in session
        session()->put('header', 'Daftar Nama Siswa');

        // Return the view with necessary data
        return view('absensi.index', compact('students', 'classes', 'tk_smt_list', 'attendanceData'));
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
