@extends('layouts_admin.template')
@section('title')
Barang Masuk
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
        <div class="col-sm-2 mb-2">
          <a href=" {{ route('brgmasuk.create') }} " class="btn btn-block btn-primary">Input Barang Masuk</a>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Tgl Transaksi</th>
                <th>Produk</th>
                <th>Qty Masuk</th>
              </tr>
            </thead>
            <tbody>

              @php
              $no = 1;
              @endphp
              @foreach ($barang_masuk as $row)
              <tr>
                <td>{{ $no++ }}</td>
                <td> {{ $row->tgl_transaksi }} </td>
                <td> {{ $row->produk->nama_produk }} </td>
                <td> {{ $row->qty }} </td>
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