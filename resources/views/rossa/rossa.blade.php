@extends('backend.admin')
@section('judul','rossa')

@section('isi')
<h2>ini kumpulan lagu Rossa</h2>

<a href="/tambah_rossa" class="btn btn-success my-2">Tambah Lagu Rossa</a>

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
    @foreach ($rossa as $rs)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$rs->judul}}</td>
      <td>{{$rs->pencipta}}</td>
      <td>{{$rs->durasi}}</td>
      <td>{{$rs->rilis}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <form class="" action="/rossa/{{ $rs->id }}" method="post">
                 @method('delete')
                 @csrf
                 <button type="submit" onclick="return confirm('Yakin Mau Menghapus Data?')" class="btn btn-danger">Hapus</button>
                 <a href="/edit_rossa/{{$rs->id}}" class="btn btn-warning">Edit</a>
                 <a href="/lihat_rossa/{{$rs->id}}" class="btn btn-success">Lihat</a>
               </form>
      </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div style="">
  {{$rossa->links()}}
</div>
@endsection
