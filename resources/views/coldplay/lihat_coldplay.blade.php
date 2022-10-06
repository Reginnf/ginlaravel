@extends('backend.admin')
@section('judul','Lihat Lagu Coldplay')

@section('isi')

<div class="container">
    <div class="row">
    <div class="col-6">
    <h1 class="mt-3">Halaman Detail Musik Coldplay</h1>

    <div class="card">
    <div class="card-body">
      <div class="" style="">
          <img src="/image/{{ $coldplay->image }}" alt="" width="200" height="200"
      </div>
    <h5 class="card-title">Judul : {{ $coldplay->judul }} </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pencipta : {{ $coldplay->pencipta }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Durasi: {{ $coldplay->durasi }}</h6>
    <p class="card-text">Rilis : {{ $coldplay->rilis }}</p>
    <p class="card-text">Posted : {!! date('d M y', strtotime ($coldplay->created_at)) !!}</p>

    <a href="/coldplay" class="btn btn-warning">kembali</a>
  </div>
</div>

    </div>
    </div>
    </div>

@endsection
