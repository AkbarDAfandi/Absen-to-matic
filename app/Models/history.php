<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'history';

    protected $fillable = [
        'NIPD',
        'Kelas',
        'Jurusan',
        'No Absen',
        'Nama',
        'Jenis Kelamin',
    ];
}
