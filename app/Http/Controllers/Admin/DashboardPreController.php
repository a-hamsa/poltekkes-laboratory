<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerPreklinik;
use App\Models\DescriptionPreklinik;
use App\Models\DosenPreklinik;
use App\Models\SchedulePreklinik;
use App\Models\SopClinic;
use App\Models\SopPreklinik;
use App\Models\TatibPreklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardPreController extends Controller
{
    public function banner()
    {
        $banner = BannerPreklinik::first(); // assuming you have a banner with id 1
        session()->put('header', 'Banner Pre-Klinik');
        return view('preclinic.banner', compact('banner'));
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
        $banner = BannerPreklinik::firstOrCreate();
        $banner->image = $imageUrl;
        $banner->save();

        return redirect()->back()->with('success', 'Banner updated successfully!');
    }

    public function desc()
    {
        $desc = DescriptionPreklinik::first(); // assuming you have a banner with id 1

        session()->put('header', 'Deskripsi Pre-Klinik');
        return view('preclinic.desc', compact('desc'));
    }

    public function updateDescription(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $section = DescriptionPreklinik::first();
        if ($section) {
            $section->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        } else {
            // create a new record if no record exists
            $section = DescriptionPreklinik::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        }

        // Save the changes
        $section->save();

        return redirect()->back()->with('success', 'Description updated successfully!');
    }

    public function schedule()
    {
        $schedule = SchedulePreklinik::first(); // assuming you have a banner with id 1

        session()->put('header', 'Jadwal Pemakaian Pre-Klinik');
        return view('preclinic.schedule', compact('schedule'));
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
        Storage::putFileAs('public/preklinik', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/preklinik/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $schedule = SchedulePreklinik::firstOrCreate();
        $schedule->pdf_file = $pdfFileUrl;
        $schedule->save();

        return redirect()->back()->with('success', 'Schedule updated successfully!');
    }

    public function dosen()
    {
        $dosen = DosenPreklinik::first(); // assuming you have a banner with id 1

        session()->put('header', 'Daftar Nama Dosen Pre-Klinik');
        return view('preclinic.dosen', compact('dosen'));
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
        Storage::putFileAs('public/preklinik', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/preklinik/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $dosen = DosenPreklinik::firstOrCreate();
        $dosen->pdf_file = $pdfFileUrl;
        $dosen->save();

        return redirect()->back()->with('success', 'Schedule updated successfully!');
    }

    public function tatib()
    {
        $tatib = TatibPreklinik::first(); // assuming you have a banner with id 1

        session()->put('header', 'Tata Tertib lab');
        return view('preclinic.tatib', compact('tatib'));
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
        Storage::putFileAs('public/preklinik', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/preklinik/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $tatib = TatibPreklinik::firstOrCreate();
        $tatib->pdf_file = $pdfFileUrl;
        $tatib->save();

        return redirect()->back()->with('success', 'Schedule updated successfully!');
    }

    public function sop()
    {
        $sop = SopPreklinik::first(); // assuming you have a banner with id 1

        session()->put('header', 'SOP dan Instruksi kerja');
        return view('preclinic.sop', compact('sop'));
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
        Storage::putFileAs('public/preklinik', $pdf_file, $pdfFileName);

        // Get the full URL of the uploaded PDF file
        $pdfFileUrl = Storage::url('public/preklinik/' . $pdfFileName);

        // Update the schedule PDF path in your database or config
        // For example, let's assume you have a `Schedule` model
        $tatib = SopClinic::firstOrCreate();
        $tatib->pdf_file = $pdfFileUrl;
        $tatib->save();

        return redirect()->back()->with('success', 'Schedule updated successfully!');
    }
}
