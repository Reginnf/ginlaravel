@extends('backend.admin')
@section('judul','Lihat Lagu OneDirection')

@section('isi')

<div class="container">
    <div class="row">
    <div class="col-6">
    <h1 class="mt-3">Halaman Detail Musik OneDirection</h1>

    <div class="card">
    <div class="card-body">
      <div class="" style="">
          <img src="/image/{{ $onedirection->image }}" alt="" width="200" height="200"
      </div>
    <h5 class="card-title">Judul : {{ $onedirection->judul }} </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pencipta : {{ $onedirection->pencipta }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Durasi: {{ $onedirection->durasi }}</h6>
    <p class="card-text">Rilis : {{ $onedirection->rilis }}</p>
    <p class="card-text">Posted : {!! date('d M y', strtotime ($onedirection->created_at)) !!}</p>

    <a href="/onedirection" class="btn btn-warning">kembali</a>
  </div>
</div>

    </div>
    </div>
    </div>

@endsection
