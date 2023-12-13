<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kelola Makanan Minuman</title>
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
                <li class="breadcrumb-item active">Edit Makanan Minuman</li>
            </ol>
            <p style="color:red">*Gambar Makanan Minuman Harus di update ulang</p>
            <form action="{{ route('produk.ubah', $update->produk_id) }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Nama Produk</label>
                      <input type="text" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{$update->nama_produk}}"/>
                    
                      @error('nama_produk')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example2">Jenis Produk</label>
                        <select class="form-control @error('nama_jenis_produk') is-invalid @enderror" aria-label="Default select example" name="nama_jenis_produk">
                            <option selected disabled>Pilih Jenis Produk</option>
                            @foreach ( $level as $leveljenisproduks )
                            <option value="{{ $leveljenisproduks->id_levelproduk }}" @if( $leveljenisproduks->id_levelproduk == $update->id_levelproduk)  selected  @endif>
                                {{ $leveljenisproduks->namalevel }}</option>
                            @endforeach
                          </select>        
                          @error('nama_jenis_produk')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                          <label class="form-label" for="form6Example1">Stock Makanan dan Minuman</label>
                        <input type="number" id="form6Example1" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{$update->stock}}" />                 
                        @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror  
                    </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                          <label class="form-label" for="form6Example2">Gambar Makanan dan Minuman</label>
                        <input type="file" id="form6Example2" class="form-control @error('file_foto') is-invalid @enderror" name="file_foto" value="{{$update->file_foto}}"/>
                        @error('file_foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror  
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                          <label class="form-label" for="form6Example1">Harga Makanan dan Minuman</label>
                        <input type="number" id="form6Example1" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$update->harga}}" />                 
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror  
                    </div>
                    </div>
                    <div class="col">
                    </div>
                  </div>
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Edit</button>
            </form>
        </div>
    </main>
@include('admin-side.template.footer')