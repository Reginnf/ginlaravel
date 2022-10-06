@extends('backend.admin')
@section('judul','onedirection')

@section('isi')
<h2>ini kumpulan lagu OneDirection</h2>

<a href="/tambah_onedirection" class="btn btn-success my-2">Tambah Lagu OneDirection</a>

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
    @foreach ($onedirection as $od)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$od->judul}}</td>
      <td>{{$od->pencipta}}</td>
      <td>{{$od->durasi}}</td>
      <td>{{$od->rilis}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <form class="" action="/onedirection/{{ $od->id }}" method="post">
                 @method('delete')
                 @csrf
                 <button type="submit" onclick="return confirm('Yakin Mau Menghapus Data?')" class="btn btn-danger">Hapus</button>
                 <a href="/edit_onedirection/{{$od->id}}" class="btn btn-warning">Edit</a>
                 <a href="/lihat_onedirection/{{$od->id}}" class="btn btn-success">Lihat</a>
               </form>
      </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div style="">
  {{$onedirection->links()}}
</div>
@endsection
