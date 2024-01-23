<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;

class dbViewController extends Controller
{
    public function index()
    {
        $persons = persons::orderBy('UUID','asc')->paginate(15);
        return view('dashboard', ['persons' => $persons]);
    }

    public function edit($uuid)
    {
        $persons = persons::where('UUID', $uuid)->first();
        return view('admin.edit')->with('persons', $persons);
    }

    public function update(Request $request, $persons)
    {
        $persons = persons::where('UUID', $persons)->firstOrFail();
        $request->validate([
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Absen' => 'required',
            'Nama' => 'required',
            'Jenis_Kelamin' => 'required',
        ]);

        $persons->update([
            'Kelas' => $request->Kelas,
            'Jurusan' => $request->Jurusan,
            'No_Absen' => $request->{'No Absen'},
            'Nama' => $request->Nama,
            'Jenis_Kelamin' => $request->{'Jenis Kelamin'},
        ]);

        return redirect('dashboard')->with('success', 'Berhasi mengubah data');
    }
}
