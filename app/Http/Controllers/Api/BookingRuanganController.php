<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingRuangan;

use Illuminate\Support\Facades\Validator;

class BookingRuanganController extends Controller
{
    public function boobkingRuangan(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'nama' => 'required',
            'prodi' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'namaruangan' => 'required',
            'jadwal' => 'required',
            'keterangan' => 'required',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }
        $booking = BookingRuangan::create($requset->all());

        if($booking){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat Pemesanan Berhasil',
                'user' => $booking
            ]);
        }
            return $this->error('Pemesanan gagal');
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
