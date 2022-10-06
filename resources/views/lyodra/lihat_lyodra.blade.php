@extends('backend.admin')
@section('judul','Lihat Lagu Lyodra')

@section('isi')

<div class="container">
    <div class="row">
    <div class="col-6">
    <h1 class="mt-3">Halaman Detail Musik Lyodra</h1>

    <div class="card">
    <div class="card-body">
      <div class="" style="">
          <img src="/image/{{ $lyodra->image }}" alt="" width="200" height="200"
      </div>
    <h5 class="card-title">Judul : {{ $lyodra->judul }} </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pencipta : {{ $lyodra->pencipta }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Durasi: {{ $lyodra->durasi }}</h6>
    <p class="card-text">Rilis : {{ $lyodra->rilis }}</p>
    <p class="card-text">Posted : {!! date('d M y', strtotime ($lyodra->created_at)) !!}</p>

    <a href="/lyodra" class="btn btn-warning">kembali</a>
  </div>
</div>

    </div>
    </div>
    </div>

@endsection
