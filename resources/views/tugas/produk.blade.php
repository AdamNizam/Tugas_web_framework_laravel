@extends('tugas.master')
@section('title', 'Produk')
@section('content')
<div class="container">
   <form class="mt-4" role="search">
     <div class="row">
       <div class="col-9">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-primary" type="submit">cari</button>
      </div>
      <div class="col-auto">
        <button  class="btn btn-outline-success" type="button"data-bs-toggle="modal" data-bs-target="#exampleModal">tambah</button>
      </div>
    </div>
    </form>
    <table class="table table-striped table-hover mt-3">
    <thead class="bg-primary text-light">
     <tr>
      <th scope="col">id</th>
      <th scope="col">nama</th>
      <th scope="col">stock</th>
      <th scope="col">harga</th>
      <th scope="col">Dekskripsi</th>
      <th scope="col">kategori</th>
      <th scope="col">Hapus</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @forEach ( $produks as $produk )
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$produk->nama}}</td>
      <td>{{$produk->stock}}</td>
      <td>{{$produk->harga}}</td>
      <td>{{$produk->dekskripsi}}</td>
      <td>{{$produk->kategori}}</td>
      <td>
        <form action="{{route('produk.destroy', $produk->id_produk)}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger" onclick=" return confirm('apakah anda yakin')"><i class="bi bi-trash-fill"></i></button>
        </form>
      </td>
      <td>
        <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
        </td>
    </tr>    
    @endForEach
  </tbody>
</table>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('produk.store')}}" method="post">
        @csrf 
       <div class="modal-body">
        <div class="form-group">
          <label for="inputnama" class="form-label" >Nama :</label>
          <input type="text" id="inputnama" class="form-control" name="nama">
        </div>
          <div class="form-group">
            <label for="inputStock" class="form-label">Stock :</label>
            <input type="number" id="inputStock" class="form-control" name="stock">
          </div>
          <div class="form-group">
            <label for="inputDeksripsi" class="form-label">Dekskripsi :</label>
            <input type="text" id="inputDeksripsi" class="form-control" name="deskripsi">
          </div>
          <div class="form-group">
            <label for="inputHarga" class="form-label">harga</label>
            <input type="text" id="inputHarga" class="form-control" name="harga">
          </div>
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
              <option value="">Pilih Kategori</option>
              @foreach($kategori as $data)
              <option value="{{$data->id_kategori}}">{{$data->kategori}}</option>
              @endForEach
            </select>
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection