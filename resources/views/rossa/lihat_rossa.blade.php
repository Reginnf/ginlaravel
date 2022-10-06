@extends('backend.admin')
@section('judul','Lihat Lagu Rossa')

@section('isi')

<div class="container">
    <div class="row">
    <div class="col-6">
    <h1 class="mt-3">Halaman Detail Musik rRssa</h1>

    <div class="card">
    <div class="card-body">
      <div class="" style="">
          <img src="/image/{{ $rossa->image }}" alt="" width="200" height="200"
      </div>
    <h5 class="card-title">Judul : {{ $rossa->judul }} </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pencipta : {{ $rossa->pencipta }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Durasi: {{ $rossa->durasi }}</h6>
    <p class="card-text">Rilis : {{ $rossa->rilis }}</p>
    <p class="card-text">Posted : {!! date('d M y', strtotime ($rossa->created_at)) !!}</p>

    <a href="/rossa" class="btn btn-warning">kembali</a>
  </div>
</div>

    </div>
    </div>
    </div>

@endsection
