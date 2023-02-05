@extends('layouts_admin.template')
@section('title')
Produk
@endsection
@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success fade show" role="alert" id="msg">
        {{ session('status') }}
      </div>
      @endif
      <div class="row mb-4">
        <div class="col-sm-1 mb-2">
          <a href=" {{ route('produk.create') }} " class="btn btn-block btn-primary">Tambah Data</a>
        </div>
      </div>

      <div class="row-">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th style="width:30%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach ($produk as $row)
              <tr>
                <td>{{ $no++ }}</td>
                <td> {{ $row->nama_produk }} </td>
                <td>{{ $row->kategori->kategori }}</td>
                <td> @rupiah($row->harga)</td>
                <td>{{ $row->stok }}</td>
                <td>
                  <img src="{{ asset('upload/'.$row->gambar_produk) }}" class="thumbnail" width="100" alt="">
                </td>
                <td>
                  <form action=" {{ route('produk.destroy',$row->kd_produk) }} " method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                    {{ method_field('DELETE') }}
                    @csrf
                    <a href="{{ route('produk.edit',$row->kd_produk) }} " class="btn btn-warning"> Edit</a>
                    <button type="submit" class="btn btn-danger"> Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('js')
  <script>
    setTimeout(() => {
      $('#msg').alert('close')
    }, 2000);
  </script>
  @endsection