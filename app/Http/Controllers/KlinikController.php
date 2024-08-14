<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlinikController extends Controller
{
    public function index()
    {
        return view('laboratorium');
    }
}
