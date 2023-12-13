<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kelola Akun User</title>
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
                <li class="breadcrumb-item active">Kelola Akun User</li>
            </ol>
            <div class="col-3">

            </div>
        </br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Akun User
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nomor KTP</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">email</th>
                                <th style="text-align: center">Role</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            <tr>
                                <td style="text-align: center">{{$user->ktp}}</td>
                                <td style="text-align: center">{{$user->nama_lengkap}}</td>
                                <td style="text-align: center">{{$user->nohp}}</td>
                                <td style="text-align: center">{{$user->email}}</td>
                                @if($user->role == 0)
                                <td style="text-align: center">Mahasiswa</td>    
                                @else   
                                <td style="text-align: center">Admin KopKan</td>    
                                @endif
                                <td style="text-align: center">
                                <button class="btn btn-outline-danger" onclick="window.location.href='/kelolaakun/delete/{{ $user->id }}'"
                                data-toggle="modal"
                                data-target="#myModal{{$user->id}}"><i class="fa fa-trash" aria-hidden="true"></i>
                                   </button>
                            </td>
                            </tr>

          
        
                            <div class="modal fade"
                            id="myModal{{ $user->id }}"
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
                                        <h4 class="modal-title">Hapus Akun User
                                        </h4>
                                        <button type="button" class="close"
                                            data-dismiss="modal"><i
                                                class="ti-close"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus
                                            Akun {{$user->nama_lengkap}} ?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button class="btn btn-danger"
                                            onclick="window.location.href='/kelolaakun/delete/{{ $user->id  }}'"
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