<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class history_scan extends Controller
{
    public function index()
    {
        $history_scans = HistoryScan::all();

        return view('history', ['historyScans' => $historyScans]);
    }
}
