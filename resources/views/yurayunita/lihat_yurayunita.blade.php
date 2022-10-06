@extends('backend.admin')
@section('judul','Lihat Lagu YuraYunita')

@section('isi')

<div class="container">
    <div class="row">
    <div class="col-6">
    <h1 class="mt-3">Halaman Detail Musik YuraYunita</h1>

    <div class="card">
    <div class="card-body">
      <div class="" style="">
          <img src="/image/{{ $yurayunita->image }}" alt="" width="200" height="200"
      </div>
    <h5 class="card-title">Judul : {{ $yurayunita->judul }} </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pencipta : {{ $yurayunita->pencipta }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Durasi: {{ $yurayunita->durasi }}</h6>
    <p class="card-text">Rilis : {{ $yurayunita->rilis }}</p>
    <p class="card-text">Posted : {!! date('d M y', strtotime ($yurayunita->created_at)) !!}</p>

    <a href="/yurayunita" class="btn btn-warning">kembali</a>
  </div>
</div>

    </div>
    </div>
    </div>

@endsection
