<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;

class dbController extends Controller
{
    public function show($id)
    {
        return persons::where('UUID', $id)->firstOrFail();
    }

}
