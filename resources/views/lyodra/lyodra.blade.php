@extends('backend.admin')
@section('judul','lyodra')

@section('isi')
<h2>ini kumpulan lagu Lyodra</h2>

<a href="/tambah_lyodra" class="btn btn-success my-2">Tambah Lagu Lyodra</a>

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
    @foreach ($lyodra as $ly)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$ly->judul}}</td>
      <td>{{$ly->pencipta}}</td>
      <td>{{$ly->durasi}}</td>
      <td>{{$ly->rilis}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <form class="" action="/lyodra/{{ $ly->id }}" method="post">
                 @method('delete')
                 @csrf
                 <button type="submit" onclick="return confirm('Yakin Mau Menghapus Data?')" class="btn btn-danger">Hapus</button>
                 <a href="/edit_lyodra/{{$ly->id}}" class="btn btn-warning">Edit</a>
                 <a href="/lihat_lyodra/{{$ly->id}}" class="btn btn-success">Lihat</a>
               </form>
      </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div style="">
  {{$lyodra->links()}}
</div>
@endsection
