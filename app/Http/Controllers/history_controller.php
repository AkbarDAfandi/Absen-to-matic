<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class history_controller extends Controller
{
    public function scanNipd(Request $request) {
        HistoryScan::create([
            'nipd' => $request->nipd,
            'scanned_at' => now()
        ]);
    }
        
}
