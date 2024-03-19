<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    use HasFactory;

    protected $table = 'persons';

    public $timestamps = false;

    protected $fillable = [
        'NIPD',
        'Kelas',
        'Jurusan',
        'No Absen',
        'Nama',
        'Jenis Kelamin',
    ];
    public $primaryKey = 'UUID'; 
}
