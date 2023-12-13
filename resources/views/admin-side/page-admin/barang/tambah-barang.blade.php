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
                <li class="breadcrumb-item active">Tambah Barang dan Snack</li>
            </ol>
            
            <form action="{{ route('formbarang.store') }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Nama barang</label>
                      <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{old('nama_barang')}}"/>
                    
                      @error('nama_barang')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example2">Jenis barang</label>
                        <select class="form-control @error('nama_jenis_barang') is-invalid @enderror" aria-label="Default select example" name="nama_jenis_barang">
                            <option selected disabled>Pilih Jenis barang</option>
                            @foreach ( $leveljenisbarang as $leveljenisbarangs )
                            <option value="{{ $leveljenisbarangs->id_levelbarang }}"{{old('nama_jenis_barang')== $leveljenisbarangs->id_levelbarang ? 'selected': null }}>
                                {{ $leveljenisbarangs->namalevel }}</option>
                            @endforeach
                          </select>        
                          @error('nama_jenis_barang')
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
                          <label class="form-label" for="form6Example1">Stock Barang</label>
                        <input type="number" id="form6Example1" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{old('stock')}}" />                 
                        @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror  
                    </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                          <label class="form-label" for="form6Example2">Gambar Barang</label>
                        <input type="file" id="form6Example2" class="form-control @error('file_foto') is-invalid @enderror" name="file_foto" value="{{old('file_foto')}}"/>
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
                          <label class="form-label" for="form6Example1">Harga Barang</label>
                        <input type="number" id="form6Example1" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{old('harga')}}" />                 
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
                <button type="submit" class="btn btn-primary btn-block mb-4">Tambahkan</button>
            </form>
        </div>
    </main>
@include('admin-side.template.footer')