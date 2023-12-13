<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;


class ruanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        
    }

    public function kelolaruangan()
    {
        $dataruangan=ruangan::all();
        return view('admin-side.page-admin.ruangan.kelolaruangan')->with([
            'dataruangan' => $dataruangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $tambahruangan = new ruangan();
        $tambahruangan->nama_ruangan = $request->nama_ruangan;
        $tambahruangan->keterangan = $request->keterangan;
    
                
        $tambahruangan->save();
        return redirect('kelolaruangan');
    }

    public function tambahruangan(){
        return view('admin-side.page-admin.ruangan.tambahruangan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $update = ruangan::find($id);
        return view('admin-side.page-admin.ruangan.editruangan', compact('update'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

       
        $update = ruangan::find($id);
        
        $update->nama_ruangan = $request->nama_ruangan;
        $update->keterangan = $request->keterangan;
        $update->save();

        return redirect('kelolaruangan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        //
        $hapus = ruangan::find($id);
        if ($hapus->delete()) {
        }
        return redirect()->back();

    }
}
