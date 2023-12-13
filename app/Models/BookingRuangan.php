<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRuangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'prodi',
        'nim',
        'angkatan',
        'namaruangan',
        'jadwal',
        'keterangan',
    ];

}
