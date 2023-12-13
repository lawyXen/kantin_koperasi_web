<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliPulsa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'prodi',
        'nim',
        'angkatan',
        'nohp',
        'nominal',
        'kartu',
    ];
}
