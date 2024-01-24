<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;

class guruController extends Controller
{
    public function search(Request $request)
    {
        $uuid = $request->input('nipd'); // get the UUID from the form
        $persons = persons::where('NIPD', $uuid)->first(); // search the database

        if ($persons) {
            return view('dashGuru', ['person' => $persons]); // if person found, show the person's details
        } else {
            return redirect()->back()->withErrors(['nipd' => 'No person found with this UUID']); // if no person found, redirect back with error message
        }
    }

    public function view()
    {
        return view('dashGuru');
    }

}
