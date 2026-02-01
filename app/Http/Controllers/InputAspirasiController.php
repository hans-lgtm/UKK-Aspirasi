<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputAspirasiController extends Controller
{
    public function create()
    {
        return view('input-aspirasi.create');
    }
}
