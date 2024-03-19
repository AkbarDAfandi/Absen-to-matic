<?php

namespace App\Exports;

use App\Models\history;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapAbsen implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = history::orderBy('No Absen', 'asc')->get();
        return $data;
    }
}
