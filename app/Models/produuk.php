<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produuk extends Model
{
    use HasFactory;
    protected $table = 'produuks';
    protected $primaryKey = 'produk_id';
}
