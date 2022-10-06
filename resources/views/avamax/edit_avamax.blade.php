@extends('backend.admin')
@section('judul','Edit Lagu AvaMax')

@section('isi')

<h1 class="mt-3">Edit Lagu AvaMax</h1>

    <form method="post" action='/editavamax/{{$avamax->id}}' enctype="multipart/form-data">
            @method('patch')
            @csrf
          <div class="mb-1 col-5">
            <label for="nama" class="form-label">Judul</label>
            <input class="form-control @error('nama') is-invalid @enderror" id="judul" placeholder="Masukan Judul" value="{{$avamax->judul}}" name="judul" require>
          </div>
          <div class="mb-3 col-5">
            <label for="npm" class="form-label">Pencipta</label>
            <input class="form-control @error('npm') is-invalid @enderror" id="pencipta" placeholder="Masukan Pencipta" value="{{$avamax->pencipta}}" name="pencipta">
          </div>
          <div class="mb-3 col-5">
            <label for="npm" class="form-label">Durasi</label>
            <input class="form-control @error('npm') is-invalid @enderror" id="durasi" placeholder="Masukan Durasi" value="{{$avamax->durasi}}" name="durasi">
          </div>
          <div class="mb-3 col-5">
            <label for="npm" class="form-label">Rilis</label>
            <input class="form-control @error('npm') is-invalid @enderror" id="rilis" placeholder="Masukan Rilis" value="{{$avamax->rilis}}" name="rilis">
          </div>
          <div class="form-group">
              <label for="image">Pilih Foto</label>
              <input type="file" class="form-control-file" id="image" name="image">
          </div>
          <div class="" style="margin-left:15px;">
              <img src="/image/{{ $avamax->image }}" alt="" width="90" height="90"
          </div>
          <br>
          <br>
          <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection
