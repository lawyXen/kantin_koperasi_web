<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;

class BarangController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $barang = barang::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Barang/Snack Berhasil',
            'barangs' => $barang
        ]);
    }

}
