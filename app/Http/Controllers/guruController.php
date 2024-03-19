<?php

namespace App\Http\Controllers;

use App\Livewire\History as LivewireHistory;
use Illuminate\Http\Request;
use App\Models\persons;
use App\Models\history;
use App\Exports\RekapAbsen;
use Maatwebsite\Excel\Facades\Excel;

class guruController extends Controller
{
    public function search(Request $request)
    {
        $uuid = $request->input('nipd'); // get the UUID from the form
        $persons = persons::where('NIPD', $uuid)->first(); // search the database
        $exists = History::where('NIPD', $request->nipd)->exists();

        if($exists){
            return back()->withErrors(['nipd' => 'Absen hanya bisa di lakukan 1x sehari']);
        }

        if ($persons) {
            $data =[
                'NIPD' => $request->nipd,
                'Kelas' => $persons->Kelas,
                'Jurusan' => $persons->Jurusan,
                'No_Absen' => $persons->No_Absen,
                'Nama' => $persons->Nama,
                'Jenis Kelamin' => $persons->Jenis_kelamin,
            ];

            if($persons->{'No Absen'}) {
                $data['No Absen'] = $persons->{'No Absen'};
            }

            if($persons->{'Jenis Kelamin'}) {
                $data['Jenis Kelamin'] = $persons->{'Jenis Kelamin'};
            }

            History::create($data);

            return view('dashGuru', ['person' => $persons]); // if person found, show the person's details
        } else {
            return redirect()->back()->withErrors(['nipd' => 'Data tidak ditemukan']); // if no person found, redirect back with error message
        }


    }

    public function view()
    {
        return view('dashGuru');
    }

    public function exportExcel()
    {
        return Excel::download(new RekapAbsen, "absen.xlsx");
    }

}
