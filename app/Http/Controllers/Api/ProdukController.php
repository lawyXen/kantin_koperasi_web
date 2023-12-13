<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produuk;

class ProdukController extends Controller
{

    public function index(){
        // dd($requset->all());die();
        $produk = produuk::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Produk Berhasil',
            'produks' => $produk
        ]);
    }

}
