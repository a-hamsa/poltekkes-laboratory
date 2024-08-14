<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Schedule;
use App\Models\SopClinic;
use App\Models\ClinicTatib;
use App\Models\Description;
use App\Models\ClinicDosens;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    public function index()
    {
        // dd(Description::all()->first()->description);
        $banner = optional(Banner::first())->image ?? 'file.pdf';
        $title = optional(Description::first())->title ?? 'file.pdf';
        $description = optional(Description::first())->description ?? 'file.pdf';
        $schedule = optional(Schedule::first())->pdf_file ?? 'file.pdf';
        $dosen = optional(ClinicDosens::first())->pdf_file ?? 'file.pdf';
        $tatib = optional(ClinicTatib::first())->pdf_file ?? 'file.pdf';
        $sop = optional(SopClinic::first())->pdf_file ?? 'file.pdf';

        return view('laboratorium', compact('banner', 'title', 'description', 'schedule', 'dosen', 'tatib', 'sop'));
    }
}
