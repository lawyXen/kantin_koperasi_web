<?php

namespace App\Http\Controllers;

use App\Models\leveljenisproduks;
use App\Models\produuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produuks')
        ->select('produuks.*', 'leveljenisproduks.namalevel')
        ->join('leveljenisproduks', 'produuks.id_levelproduk', '=', 'leveljenisproduks.id_levelproduk')
        ->get();
        return view('admin-side.page-admin.produk.kelolaproduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $leveljenisproduk = leveljenisproduks::all();

        return view('admin-side.page-admin.produk.tambah-produk', compact('leveljenisproduk'));
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
                'nama_produk' => 'required',
                'nama_jenis_produk' => 'required', 
                'harga' => 'required', 
                'file_foto' => 'required|mimes:jpeg,jpg,png,gif',
                'stock' => 'required'
                                          
                
            ]
        );
        $produk = new produuk();
        $produk->nama_produk = $request->nama_produk;
        $produk->id_levelproduk = $request->nama_jenis_produk;
        $produk->stock = $request->stock;
        $produk->harga = $request->harga;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/MakananMinuman', $file);
            $produk->file_foto = $file;
        }
        
        $produk->save();
        return redirect('kelolaproduk');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($produk_id)
    {
        $update = produuk::find($produk_id);
        $level = DB::table('leveljenisproduks')->get();
        return view('admin-side.page-admin.produk.edit-produk', compact('update', 'level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $produk_id)
    {   
        $this->validate(
            $request,
            [
                'nama_produk' => 'required',
                'nama_jenis_produk' => 'required', 
                'file_foto' => 'required|mimes:jpeg,jpg,png,gif',
                'stock' => 'required',
                'harga' => 'required'
                                          
                
            ]
        );
        $update = produuk::find($produk_id);
        $file = $update->file_foto;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/MakananMinuman', $file);
            $update->file_foto = $file;
        }
        $update->nama_produk = $request->nama_produk;
        $update->id_levelproduk = $request->nama_jenis_produk;
        $update->file_foto = $file;
        $update->stock = $request->stock;
        $update->harga = $request->harga;
        $update->save();

        return redirect('kelolaproduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($produk_id)
    {
        $hapus = produuk::find($produk_id);
        if ($hapus->delete()) {
        }
        return redirect()->back();
}
}
