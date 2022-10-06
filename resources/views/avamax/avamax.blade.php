@extends('backend.admin')
@section('judul','avamax')

@section('isi')
<h2>ini kumpulan lagu AvaMax</h2>

<a href="/tambah_avamax" class="btn btn-success my-2">Tambah Lagu AvaMax</a>

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
    @foreach ($avamax as $am)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$am->judul}}</td>
      <td>{{$am->pencipta}}</td>
      <td>{{$am->durasi}}</td>
      <td>{{$am->rilis}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <form class="" action="/avamax/{{ $am->id }}" method="post">
                 @method('delete')
                 @csrf
                 <button type="submit" onclick="return confirm('Yakin Mau Menghapus Data?')" class="btn btn-danger">Hapus</button>
                 <a href="/edit_avamax/{{$am->id}}" class="btn btn-warning">Edit</a>
                 <a href="/lihat_avamax/{{$am->id}}" class="btn btn-success">Lihat</a>
               </form>
      </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div style="">
  {{$avamax->links()}}
</div>
@endsection
