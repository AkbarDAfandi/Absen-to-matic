<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class qrScanners extends Controller
{
    public function index()
    {
        return view('qrScanner');
    }
}
