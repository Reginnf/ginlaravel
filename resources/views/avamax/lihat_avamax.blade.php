@extends('backend.admin')
@section('judul','Lihat Lagu AvaMax')

@section('isi')

<div class="container">
    <div class="row">
    <div class="col-6">
    <h1 class="mt-3">Halaman Detail Musik AvaMax</h1>

    <div class="card">
    <div class="card-body">
      <div class="" style="">
          <img src="/image/{{ $avamax->image }}" alt="" width="200" height="200"
      </div>
    <h5 class="card-title">Judul : {{ $avamax->judul }} </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pencipta : {{ $avamax->pencipta }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Durasi: {{ $avamax->durasi }}</h6>
    <p class="card-text">Rilis : {{ $avamax->rilis }}</p>
    <p class="card-text">Posted : {!! date('d M y', strtotime ($avamax->created_at)) !!}</p>

    <a href="/avamax" class="btn btn-warning">kembali</a>
  </div>
</div>

    </div>
    </div>
    </div>

@endsection
