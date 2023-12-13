<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kelola Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
@include('admin-side.template.header')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang, {{Auth::user()->nama_lengkap}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Kelola Barang</li>
            </ol>
            <div class="col-3">
                <a href="{{ url('/tambah-barang') }}">
                    <button class="btn btn-outline-success">Tambah Barang</button>
                </a>
            </div>
        </br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabel Barang dan Snack
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Jenis</th>
                                <th style="text-align: center">Stock</th>
                                <th style="text-align: center">Harga</th>
                                <th style="text-align: center">Gambar</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $barangs )
                            <tr>
                                <td style="text-align: center">{{$barangs->nama_barang}}</td>
                                <td style="text-align: center">{{$barangs->namalevel}}</td>
                                <td style="text-align: center">{{$barangs->stock}}</td>
                                <td style="text-align: center">{{$barangs->harga}}</td>
                                <td style="text-align: center"> 
                                    <img
                                    src="{{ 'images/Barang/' . $barangs->file_foto }}"
                                    style="width:70px; height: 70px; object-fit: cover; border:1px solid black;"
                                    alt="" data-toggle="modal"
                                    data-target="#myModalgambar{{ $barangs->barang_id}}" />
                                </td>
                                <td style="text-align: center">
                                <button class="btn btn-outline-warning"onclick="window.location.href='/edit-barang/{{ $barangs->barang_id }}'"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button class="btn btn-outline-danger" onclick="window.location.href='/barang/delete/{{ $barangs->barang_id }}'"
                                data-toggle="modal"
                                data-target="#myModal{{$barangs->barang_id}}"><i class="fa fa-trash" aria-hidden="true"></i>
                                   </button>
                            </td>
                            </tr>

          
                            <div id="myModalgambar{{ $barangs->barang_id  }}"
                                class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="{{ url('images/Barang/'.$barangs->file_foto) }}"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade"
                            id="myModal{{ $barangs->barang_id }}"
                            role="dialog">
                            <div class="modal-dialog" style="
                               position: absolute;
                                top: auto;
                                right: 0;
                                bottom:6cm;
                                box-align: centered;
                                left: 0;
                                z-index: 10040;
                                overflow: auto;
                                overflow-y: auto;">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Barang/Snack
                                        </h4>
                                        <button type="button" class="close"
                                            data-dismiss="modal"><i
                                                class="ti-close"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus
                                            barang 
                                            <b>{{ $barangs->nama_barang }}</b> ?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button class="btn btn-danger"
                                            onclick="window.location.href='/barang/delete/{{ $barangs->barang_id  }}'"
                                            data-toggle="modal"
                                            data-target="#myModal"><span
                                                class="ti-trash"
                                                style="color:black;">
                                                Hapus</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@include('admin-side.template.footer')