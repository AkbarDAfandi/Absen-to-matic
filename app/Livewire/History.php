<?php

namespace App\Livewire;

use App\Models\History as HistoryDb;
use App\Models\Persons;
use Livewire\Component;

class History extends Component
{

    public $nipd;
    public $dataHistory;

    public function addHistory()
    {
        $nipd = $this->nipd;

        $person = Persons::where('NIPD', $nipd)->first();

        HistoryDb::create([
            'NIPD' => $this->nipd,
            'Kelas' => $person->Kelas,
            'Jurusan' => $person->Jurusan,
            'No_Absen' => $person->no_absen,
            'Nama' => $person->Nama,
            'Jenis_Kelamin' => $person->jenis_kelamin
        ]);

        $this->persons = $person;
        $this->history = $history;

        $this->emit('historyUpdated', $history);
        $this->emit('personLoaded', $person);
    }

    public function render()
    {
        $this->dataHistory = HistoryDb::orderBy('created_at', 'desc')->get();
        return view('livewire.history');
    }
}
