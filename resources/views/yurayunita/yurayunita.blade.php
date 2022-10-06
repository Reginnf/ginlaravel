@extends('backend.admin')
@section('judul','yurayunita')

@section('isi')
<h2>ini kumpulan lagu YuraYunita</h2>

<a href="/tambah_yurayunita" class="btn btn-success my-2">Tambah Lagu YuraYunita</a>

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
    @foreach ($yurayunita as $yy)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$yy->judul}}</td>
      <td>{{$yy->pencipta}}</td>
      <td>{{$yy->durasi}}</td>
      <td>{{$yy->rilis}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <form class="" action="/yurayunita/{{ $yy->id }}" method="post">
                 @method('delete')
                 @csrf
                 <button type="submit" onclick="return confirm('Yakin Mau Menghapus Data?')" class="btn btn-danger">Hapus</button>
                 <a href="/edit_yurayunita/{{$yy->id}}" class="btn btn-warning">Edit</a>
                 <a href="/lihat_yurayunita/{{$yy->id}}" class="btn btn-success">Lihat</a>
               </form>
      </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div style="">
  {{$yurayunita->links()}}
</div>
@endsection
