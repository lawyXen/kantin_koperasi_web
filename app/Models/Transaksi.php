<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kode_payment',
        'kode_trx', 'total_item', 'total_harga', 'kode_unik',
        'status', 'name', 'phone', 'metode',
        'deskripsi', 'expired_at','total_transfer','bank'];

    public function details(){
        return $this->hasMany(TransaksiDetail::class, "transaksi_id", "id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}