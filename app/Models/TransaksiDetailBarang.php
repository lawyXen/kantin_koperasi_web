<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetailBarang extends Model
{
    use HasFactory;
    protected $fillable = ['transaksibarang_id', 'barang_id', 'total_item', 'catatan',
    'kode_promo', 'harga_asli', 'total_harga'];

    public function transaksibarang(){
        return $this->belongsTo(TransaksiBarang::class, "transaksibarang_id", "id");
    }

    public function barang(){
        return $this->belongsTo(barang::class, "barang_id", "barang_id");
    }
}