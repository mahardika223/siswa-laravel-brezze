<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_urut',
        'nis',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'kelas',
        'alamat',
        'foto_path',
    ];
}
