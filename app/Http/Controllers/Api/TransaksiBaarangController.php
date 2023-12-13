<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TransaksiBarang;
use App\Models\TransaksiDetailBarang;

class TransaksiBaarangController extends Controller
{
    //
    public function storeTambah(Request $requset) {
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'user_id' => 'required',
            'total_item' => 'required',
            'total_harga' => 'required',
            'name' => 'required',
            'total_transfer' => 'required',
            'bank' => 'required',
            'phone' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_payment = "ITDEL/MHS/" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $kode_trx = "DEL/KAKOP/" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $kode_unik = rand(100, 999);
        $status = "MENUNGGU";
        $expired_at = now()->addDay();

        $dataTransaksiBarang = array_merge($requset->all(), [
            'kode_payment' => $kode_payment,
            'kode_trx' => $kode_trx,
            'kode_unik' => $kode_unik,
            'status' => $status,
            'expired_at' => $expired_at
        ]);

        \DB::beginTransaction();
        $transaksibarang = TransaksiBarang::create($dataTransaksiBarang);
        foreach ($requset->barangs as $barang) {
            $detailbarang = [
                'transaksibarang_id' => $transaksibarang->id,
                'barang_id' => $barang['barang_id'],
                'total_item' => $barang['total_item'],
                'catatan' => $barang['catatan'],
                'total_harga' => $barang['total_harga']
            ];
            $transaksiDetailbarang = TransaksiDetailBarang::create($detailbarang);
        }

        if (!empty($transaksibarang) && !empty($transaksiDetailbarang)) {
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksibarang' => collect($transaksibarang)
            ]);
        } else {
            \DB::rollback();
            return $this->error('Transaksi gagal');
        }
    }

    public function historyTambah($id) {
        $transaksisBarang = TransaksiBarang::with(['user'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach ($transaksisBarang as $transaksi) {
            $details = $transaksi->detailsbarang;
            foreach ($details as $detail) {
                $detail->barang;
            }
        }

        if (!empty($transaksisBarang)) {
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksisBarang' => collect($transaksisBarang)
            ]);
        } else {
            $this->error('Transaksi gagal');
        }
    }
    public function batal($id){
        $transaksi = TransaksiBarang::with(['details.barang', 'user'])->where('id', $id)->first();
        if ($transaksi){
            // update data

            $transaksi->update([
                'status' => "BATAL"
            ]);
            $this->pushNotif('Transaksi Dibatalkan', "Transaksi Barang ".$transaksi->details[0]->barang->name." berhsil dibatalkan", $transaksi->user->fcm);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
        }
    }

}