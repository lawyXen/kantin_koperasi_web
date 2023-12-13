<?php

namespace App\Http\Controllers;
use App\Models\BookingRuangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingRuanganController extends Controller
{
    public function index(){
        $pemesanans = DB::table('booking_ruangans')->get();
        return view('admin-side.page-admin.validasipesanan.validasiruangan', compact('pemesanans'));
    }

    public function edit($id)
    {
        $update = BookingRuangan::find($id);

        return view('admin-side.page-admin.validasipesanan.edit-ruangan', compact('update'));
    }

    public function update(Request $request, $id){
        $update = BookingRuangan::find($id);
        $update->status = $request->status;
        $update-> save();
        return redirect('validasiruangan')->with('success', "Berhasil mengubah status pemesanan!");

    }

    public function delete($id)
    {
        $deletepemesanan = BookingRuangan::find($id);
        if ($deletepemesanan->delete()) {
            return redirect()->back()->with('success', "Berhasil menghapus Peminjaman!");
        }
    }
}

