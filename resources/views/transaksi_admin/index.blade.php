@extends('layouts_admin.template')
@section('title')
Data Transaksi Masuk
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datepicker/css/datepicker.css">
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
      <div>
        <div class="d-flex" style="justify-content: flex-end">
            <a href="/admin/transaksi/cetak_pdf" class="btn btn-info">print</a>
        </div>
        <br>
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Trans_id</th>
              <th>Tgl Transaksi</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($transaksi as $row)
            <tr>
              <td>{{ $no++ }}.</td>
              <td> {{ $row->kd_transaksi }} </td>
              <td>{{ $row->produk->nama_produk }}</td>
              <td>{{ $row->tgl_transaksi }}</td>
              <td>{{ $row->jumlah }}</td>
              <td>{{ $row->bayar }}</td>
              <td> {{$row->status}}</td>
              <td>
                @if ($row->status == 'menunggu')
                <form action=" {{ route('transaksiadmin.update',$row->kd_transaksi) }} " method="post" onsubmit="return confirm('Apakah anda yakin ?')">
                  {{ method_field('PUT') }}
                  @csrf
                  <button type="submit" class="btn btn-primary"> Konfirmasi</button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection
  @section('js')
  <script src="{{ asset('adminlte')}}/plugins/datepicker/js/bootstrap-datepicker.js"></script>
  <script>
    $('#start_date').click(function(e) {
      $('#start_date').datepicker('show');
    });
    $('#end_date').click(function(e) {
      $('#end_date').datepicker('show');
    });
  </script>
  <script>
    setTimeout(() => {
      $('#msg').alert('close')
    }, 2000);
  </script>

  @endsection
