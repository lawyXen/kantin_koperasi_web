<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\leveljenisbarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barangs')
        ->select('barangs.*', 'leveljenisbarang.namalevel')
        ->join('leveljenisbarang', 'barangs.id_levelbarang', '=', 'leveljenisbarang.id_levelbarang')
        ->get();
        return view('admin-side.page-admin.barang.kelola-barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $leveljenisbarang = leveljenisbarang::all();

        return view('admin-side.page-admin.barang.tambah-barang', compact('leveljenisbarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate(
            $request,
            [
                'nama_barang' => 'required',
                'nama_jenis_barang' => 'required', 
                'file_foto' => 'required|mimes:jpeg,jpg,png,gif',
                'stock' => 'required',
                'harga' => 'required'
                                          
                
            ]
        );
        $produk = new barang();
        $produk->nama_barang = $request->nama_barang;
        $produk->id_levelbarang = $request->nama_jenis_barang;
        $produk->stock = $request->stock;
        $produk->harga = $request->harga;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/Barang', $file);
            $produk->file_foto = $file;
        }
        
        $produk->save();
        return redirect('kelolabarang');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($barang_id)
    {
        $update = barang::find($barang_id);
        $level = DB::table('leveljenisbarang')->get();
        return view('admin-side.page-admin.barang.edit-barang', compact('update', 'level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $barang_id)
    {   
        $this->validate(
            $request,
            [
                'nama_barang' => 'required',
                'nama_jenis_barang' => 'required', 
                'file_foto' => 'required|mimes:jpeg,jpg,png,gif',
                'stock' => 'required',
                'harga' => 'required'
                                          
                
            ]
        );
        $update = barang::find($barang_id);
        $file = $update->file_foto;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/Barang', $file);
            $update->file_foto = $file;
        }
        $update->nama_barang = $request->nama_barang;
        $update->id_levelbarang = $request->nama_jenis_barang;
        $update->file_foto = $file;
        $update->stock = $request->stock;
        $update->harga = $request->harga;
        $update->save();

        return redirect('kelolabarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($produk_id)
    {
        $hapus = barang::find($produk_id);
        if ($hapus->delete()) {
        }
        return redirect()->back();
}
}
