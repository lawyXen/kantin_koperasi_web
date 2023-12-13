<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BeliPulsa;
use Illuminate\Support\Facades\Validator;
class BeliPulsaController extends Controller
{
    public function belipulsa(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'nama' => 'required',
            'prodi' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'nohp' => 'required',
            'nominal' => 'required',
            'kartu' => 'required',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }
        $booking = BeliPulsa::create($requset->all());

        if($booking){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat Pembelian Berhasil',
                'user' => $booking
            ]);
        }
            return $this->error('Pembelian gagal');
    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
