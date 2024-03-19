<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;

class rekapView extends Controller
{
    public function index()
    {
        $history = history::orderBy('No Absen','asc')->paginate(15);
        return view('rekapAbsen', ['history' => $history]);
    }
}
