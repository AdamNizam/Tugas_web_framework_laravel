@extends('tugas.master')
@section('title', 'kategori')
@section('content')
<div class="container">
    <table class="table table-striped table-hover mt-3">
    <thead class="bg-primary text-light">
     <tr>
      <th scope="col">id_kategori</th>
      <th scope="col">kategori</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    @forEach( $kategoris as $kategori)
    <tr>
      <th scope="row">{{$kategori->id_kategori}}</th>
      <td>{{$kategori->kategori}}</td>
      <td>{{$kategori->keterangan}}</td>
      <td>
       <form action="{{route('kategori.destroy', $kategori->id_kategori)}}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger" onclick=" return confirm('apakah anda yakin')"><i class="bi bi-trash-fill"></i></button>
        </form>
      </td>
    </tr>
    @endForEach
  </tbody>
</table>
</div>
@endsection