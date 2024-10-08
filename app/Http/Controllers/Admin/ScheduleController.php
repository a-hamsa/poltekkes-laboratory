<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Semester;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        session()->put('header', 'Jadwal Penggunaan Lab');

        $schedules = Schedule::with('semester')->get();
        return view('admin.schedule', compact('schedules'));
    }

    public function create()
    {
        $semesters = Semester::all();
        return view('schedules.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
            'pdf_file' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('pdf_file')) {
            $fileName = time().'_'.$request->file('pdf_file')->getClientOriginalName();
            $filePath = $request->file('pdf_file')->storeAs('uploads', $fileName, 'public');
            $validated['pdf_file'] = $fileName;
        }

        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully');
    }

    public function edit(Schedule $schedule)
    {
        $semesters = Semester::all();
        return view('schedules.edit', compact('schedule', 'semesters'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
            'pdf_file' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('pdf_file')) {
            $fileName = time().'_'.$request->file('pdf_file')->getClientOriginalName();
            $filePath = $request->file('pdf_file')->storeAs('uploads', $fileName, 'public');
            $validated['pdf_file'] = $fileName;
        }

        $schedule->update($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully');
    }
}
