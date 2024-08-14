<?php

namespace App\Http\Controllers;

use App\Models\SopClinic;
use App\Models\SopPreklinik;
use Illuminate\Http\Request;
use App\Models\StokPreclinic;
use App\Models\AbsenPreclinic;
use App\Models\DosenPreklinik;
use App\Models\TatibPreklinik;
use App\Models\BannerPreklinik;
use App\Models\SchedulePreklinik;
use App\Models\InventoryPreClinic;
use App\Models\DescriptionPreklinik;

class PreklinikController extends Controller
{
    public function index()
    {
        // dd(Description::all()->first()->description);
        $banner = optional(BannerPreklinik::first())->image ?? 'file.jpg';
        $title = optional(DescriptionPreklinik::first())->title ?? 'Text';
        $description = optional(DescriptionPreklinik::first())->description ?? 'Text';
        $schedule = optional(SchedulePreklinik::first())->pdf_file ?? 'file.pdf';
        $dosen = optional(DosenPreklinik::first())->pdf_file ?? 'file.pdf';
        $tatib = optional(TatibPreklinik::first())->pdf_file ?? 'file.pdf';
        $sop = optional(SopPreklinik::first())->pdf_file ?? 'file.pdf';
        $absen = optional(AbsenPreclinic::first())->link ?? '#';

        return view('preclinic.laboratorium', compact('banner', 'title', 'description', 'schedule', 'dosen', 'tatib', 'sop', 'absen'));
    }

    public function inventory(Request $request)
    {
        $query = InventoryPreClinic::query();

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

        return view('preclinic.inventory', compact('inventories'));
    }

    public function stock(Request $request)
    {
        $query = StokPreclinic::query();

        // Searching
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_direction ?? 'asc');
        }

        $stocks = $query->paginate(10);

        return view('preclinic.stokbahan', compact('stocks'));
    }
}
