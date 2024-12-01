<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Semester;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScheduleController extends Controller
{
    public function index()
    {
        session()->put('header', 'Jadwal Penggunaan Lab');

        $schedules = Schedule::all();
        return view('admin.schedule', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'pdf_file' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('pdf_file')) {
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $filePath = $request->file('pdf_file')->storeAs('uploads', $fileName, 'public');
            $validated['pdf_file'] = $fileName;

            // Generate QR code pointing to the PDF URL
            $pdfUrl = asset('storage/uploads/' . $fileName);
            $qrCodeFileName = time() . '_qrcode.png';
            $qrCodePath = 'uploads/qrcodes/' . $qrCodeFileName;

            // Generate and save the QR code image
            \Storage::disk('public')->put($qrCodePath, QrCode::format('png')->size(200)->generate($pdfUrl));
            $validated['qr_code'] = $qrCodeFileName;
        }

        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully');
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
            'pdf_file' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('pdf_file')) {
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
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
