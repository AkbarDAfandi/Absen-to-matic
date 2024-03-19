<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

    protected $table = 'history';

    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
    
    protected $fillable = [
        'NIPD',
        'Kelas',
        'Jurusan',
        'No Absen',
        'Nama',
        'Jenis Kelamin',
    ];
}
