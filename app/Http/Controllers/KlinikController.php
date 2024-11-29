<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Banner;
use App\Models\Schedule;
use App\Models\SopClinic;
use App\Models\StokClinic;
use App\Models\ClinicTatib;
use App\Models\Description;
use App\Models\ClinicDosens;
use Illuminate\Http\Request;
use App\Models\InventoryClinics;
use App\Models\Semester;

class KlinikController extends Controller
{
    public function index()
    {
        // dd(Description::all()->first()->description);
        $banner = optional(Banner::first())->image ?? 'file.jpg';
        $title = optional(Description::first())->title ?? 'Text';
        $description = optional(Description::first())->description ?? 'Text';
        $schedule = optional(Schedule::first())->pdf_file ?? 'file.pdf';
        $dosen = optional(ClinicDosens::first())->pdf_file ?? 'file.pdf';
        $tatib = optional(ClinicTatib::first())->pdf_file ?? 'file.pdf';
        $sop = optional(SopClinic::first())->pdf_file ?? 'file.pdf';
        $absen = optional(Absen::first())->link ?? '#';

        return view('clinic.laboratorium', compact('banner', 'title', 'description', 'schedule', 'dosen', 'tatib', 'sop', 'absen'));
    }

    public function inventory(Request $request)
    {
        $query = InventoryClinics::query();

        // Searching
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_direction ?? 'asc');
        }

        // Filtering (e.g., by condition)
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }

        $inventories = $query->paginate(10);

        return view('clinic.inventory', compact('inventories'));
    }

    public function stock(Request $request)
    {
        $query = StokClinic::query();

        // Searching
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_direction ?? 'asc');
        }

        $stocks = $query->paginate(10);

        return view('clinic.stokbahan', compact('stocks'));
    }

    public function sop()
    {
        $sop = SopClinic::all();

        return view('clinic.sop', compact('sop'));
    }

    public function jadwal()
    {
        // Retrieve all schedules grouped by semester
        $schedulesBySemester = Schedule::all();

        // Pass the data to the view
        return view('schedules.index', [
            'schedulesBySemester' => $schedulesBySemester
        ]);
    }
}
