<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Description;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    public function index()
    {
        // dd(Description::all()->first()->description);
        $banner = Banner::all()->first()->image;
        $title = Description::all()->first()->title;
        $description = Description::all()->first()->description;
        return view('laboratorium', compact('banner', 'title', 'description'));
    }
}
