<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use App\Models\Schedule;
use App\Models\Description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\ClinicDosens;
use App\Models\ClinicTatib;
use App\Models\SopClinic;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        session()->put('header', 'Dashboard');
        return view('admin.home');
    }

    public function banner()
    {
        $banner = Banner::first(); // assuming you have a banner with id 1
        session()->put('header', 'Banner Klinik');
        return view('admin.banner', compact('banner'));
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Get the uploaded image
        $image = $request->file('image');

        // Store the image in the public storage
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        Storage::putFileAs('public/banners', $image, $imageName);

        // Get the full URL of the uploaded image
        $imageUrl = Storage::url('public/banners/' . $imageName);

        // Update the banner image path in your database or config
        // For example, let's assume you have a `Setting` model
        $banner = Banner::firstOrCreate();
        $banner->image = $imageUrl;
        $banner->save();

        return redirect()->back()->with('success', 'Banner berhasil diperbaharui!');
    }

    public function desc()
    {
        $desc = Description::first(); // assuming you have a banner with id 1

        session()->put('header', 'Deskripsi Klinik');
        return view('admin.desc', compact('desc'));
    }

    public function updateDescription(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $section = Description::first();
        if ($section) {
            $section->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        } else {
            // create a new record if no record exists
            $section = Description::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        }

        // Save the changes
        $section->save();

        return redirect()->back()->with('success', 'Deskripsi berhasil diperbaharui!');
    }

    public function schedule()
    {
        $schedule = Schedule::first(); // assuming you have a banner with id 1

        session()->put('header', 'Jadwal Pemakaian Lab');
        return view('admin.schedule', compact('schedule'));
    }
    public function updateSchedule(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Get the uploaded PDF file
        $pdf_file = $request->file('pdf_file');

        // Store the PDF file in the public storage
        $pdfFileName = time() . '.' . $pdf_file->getClientOriginalExtension();
        Storage::putFileAs('public/schedules', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/schedules/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $schedule = Schedule::firstOrCreate();
        $schedule->pdf_file = $pdfFileUrl;
        $schedule->save();

        return redirect()->back()->with('success', 'Jadwal berhasil diperbaharui!');
    }

    public function dosen()
    {
        $dosen = ClinicDosens::first(); // assuming you have a banner with id 1

        session()->put('header', 'Daftar Nama Dosen');
        return view('clinic.dosen', compact('dosen'));
    }

    public function updateDosen(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Get the uploaded PDF file
        $pdf_file = $request->file('pdf_file');

        // Store the PDF file in the public storage
        $pdfFileName = time() . '.' . $pdf_file->getClientOriginalExtension();
        Storage::putFileAs('public/clinic', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/clinic/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $dosen = ClinicDosens::firstOrCreate();
        $dosen->pdf_file = $pdfFileUrl;
        $dosen->save();

        return redirect()->back()->with('success', 'Jadwal berhasil diperbaharui!');
    }

    public function tatib()
    {
        $tatib = ClinicTatib::first(); // assuming you have a banner with id 1

        session()->put('header', 'Tata tertib lab');
        return view('clinic.tatib', compact('tatib'));
    }

    public function updateTatib(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Get the uploaded PDF file
        $pdf_file = $request->file('pdf_file');

        // Store the PDF file in the public storage
        $pdfFileName = time() . '.' . $pdf_file->getClientOriginalExtension();
        Storage::putFileAs('public/clinic', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/clinic/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $tatib = ClinicTatib::firstOrCreate();
        $tatib->pdf_file = $pdfFileUrl;
        $tatib->save();

        return redirect()->back()->with('success', 'Jadwal berhasil diperbaharui!');
    }

    public function sop()
    {
        $sop = SopClinic::first(); // assuming you have a banner with id 1

        session()->put('header', 'SOP dan Instruksi Kerja');
        return view('clinic.sop', compact('sop'));
    }

    public function updateSop(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Get the uploaded PDF file
        $pdf_file = $request->file('pdf_file');

        // Store the PDF file in the public storage
        $pdfFileName = time() . '.' . $pdf_file->getClientOriginalExtension();
        Storage::putFileAs('public/clinic', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/clinic/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $tatib = SopClinic::firstOrCreate();
        $tatib->pdf_file = $pdfFileUrl;
        $tatib->save();

        return redirect()->back()->with('success', 'Jadwal berhasil diperbaharui!');
    }

    public function absen()
    {
        $absen = Absen::first(); // assuming you have a banner with id 1

        session()->put('header', 'Link Absensi');
        return view('clinic.absen', compact('absen'));
    }

    public function updateAbsen(Request $request)
    {
        // Validate the request
        $request->validate([
            'link' => 'required|string',
        ]);

        $section = Absen::first();
        if ($section) {
            $section->update([
                'link' => $request->input('link'),
            ]);
        } else {
            // create a new record if no record exists
            $section = Absen::create([
                'link' => $request->input('link'),
            ]);
        }

        // Save the changes
        $section->save();

        return redirect()->back()->with('success', 'Description updated successfully!');
    }

}
