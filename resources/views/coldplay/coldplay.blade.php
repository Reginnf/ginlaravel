@extends('backend.admin')
@section('judul','coldplay')

@section('isi')
<h2>ini kumpulan lagu Coldplay</h2>

<a href="/tambah_coldplay" class="btn btn-success my-2">Tambah Lagu Coldplay</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Pencipta</th>
      <th scope="col">Durasi</th>
      <th scope="col">Rilis</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($coldplay as $cp)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$cp->judul}}</td>
      <td>{{$cp->pencipta}}</td>
      <td>{{$cp->durasi}}</td>
      <td>{{$cp->rilis}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <form class="" action="/coldplay/{{ $cp->id }}" method="post">
                 @method('delete')
                 @csrf
                 <button type="submit" onclick="return confirm('Yakin Mau Menghapus Data?')" class="btn btn-danger">Hapus</button>
                 <a href="/edit_coldplay/{{$cp->id}}" class="btn btn-warning">Edit</a>
                 <a href="/lihat_coldplay/{{$cp->id}}" class="btn btn-success">Lihat</a>
               </form>
      </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div style="">
  {{$coldplay->links()}}
</div>
@endsection
