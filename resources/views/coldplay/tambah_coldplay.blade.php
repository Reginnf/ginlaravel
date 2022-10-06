@extends('backend.admin')
@section('judul','Tambah Lagu Coldplay')

@section('isi')

<h1 class="mt-3">Tambah Lagu Favorit</h1>

    <form method="post" action='/prosestambahcoldplay' enctype="multipart/form-data">
            @csrf
          <div class="mb-1 col-5">
            <label for="nama" class="form-label">Judul</label>
            <input class="form-control @error('nama') is-invalid @enderror" id="judul" placeholder="Masukan Judul" name="judul" require>
          </div>
          <div class="mb-3 col-5">
            <label for="npm" class="form-label">Pencipta</label>
            <input class="form-control @error('npm') is-invalid @enderror" id="pencipta" placeholder="Masukan Pencipta" name="pencipta">
          </div>
          <div class="mb-1 col-5">
            <label for="nama" class="form-label">Durasi</label>
            <input class="form-control @error('nama') is-invalid @enderror" id="durasi" placeholder="Masukan Durasi" name="durasi" require>
          </div>
          <div class="mb-1 col-5">
            <label for="nama" class="form-label">Rilis</label>
            <input class="form-control @error('nama') is-invalid @enderror" id="rilis" placeholder="Masukan Rilis" name="rilis" require>
          </div>
          <div class="form-group">
              <label for="image">Pilih Foto</label>
              <input type="file" class="form-control-file" id="image" name="image">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

@endsection
