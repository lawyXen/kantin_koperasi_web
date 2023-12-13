<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PemesananMakananMinumanController extends Controller
{
    public function index(){
        $pemesanans = DB::table('transaksis')->get();
        return view('admin-side.page-admin.validasipesanan.validasipesanan', compact('pemesanans'));
    }

    public function edit($id)
    {
        $update = Transaksi::find($id);

        return view('admin-side.page-admin.validasipesanan.edit-pesanan', compact('update'));
    }

    public function update(Request $request, $id){
        $update = Transaksi::find($id);
        $update->status = $request->status;
        $update-> save();
        return redirect('validasipesanan')->with('success', "Berhasil mengubah status pemesanan!");

    }

    public function delete($id)
    {
        $deletepemesanan = Transaksi::find($id);
        if ($deletepemesanan->delete()) {
            return redirect()->back()->with('success', "Berhasil menghapus pemesanan!");
        }
    }
}
