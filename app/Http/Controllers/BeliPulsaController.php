<?php

namespace App\Http\Controllers;
use App\Models\BeliPulsa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BeliPulsaController extends Controller
{
    public function index(){
        $pemesanans = DB::table('beli_pulsas')->get();
        return view('admin-side.page-admin.validasipesanan.validasipulsa', compact('pemesanans'));
    }

    public function edit($id)
    {
        $update = BeliPulsa::find($id);

        return view('admin-side.page-admin.validasipesanan.edit-pulsa', compact('update'));
    }

    public function update(Request $request, $id){
        $update = BeliPulsa::find($id);
        $update->status = $request->status;
        $update-> save();
        return redirect('validasipulsa')->with('success', "Berhasil mengubah status Pembelian Pulsa!");

    }

    public function delete($id)
    {
        $deletepemesanan = BeliPulsa::find($id);
        if ($deletepemesanan->delete()) {
            return redirect()->back()->with('success', "Berhasil menghapus Pembelian Pulsa!");
        }
    }
}
