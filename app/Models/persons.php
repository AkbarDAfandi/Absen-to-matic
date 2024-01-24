<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    use HasFactory;

    protected $table = 'persons'; // the name of your table in the database

    public $timestamps = false;

    protected $fillable = [
        'NIPD',
        'Kelas',
        'Jurusan',
        'No Absen',
        'Nama',
        'Jenis Kelamin',
    ]; // the names of the columns in your table

    public $primaryKey = 'UUID'; // the name of the primary key column in your table
}
