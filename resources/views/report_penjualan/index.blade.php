@extends('layouts.template')
@section('title')
    Report Penjualan
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <a href=" {{ route('cetak_pdf') }} " class="btn btn-primary" target="_blank" >PDF</a> 
          <a href=" {{ route('cetak_excel') }} " class="btn btn-danger" target="_blank" >Excel</a> 
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>harga</th>
                    <th>Tanggal</th>
                    <th>Agen</th>
                  </tr>
                </thead>
                <tbody>
                       @foreach ($penjualan as $row)
                       <tr>
                           <td>{{ $loop->iteration + ($penjualan->perpage() * ($penjualan->currentPage() - 1 )) }}</td>
                           <td> {{ $row->produk->nama_produk }} </td>
                           <td>{{ $row->jumlah }}</td>
                           <td>@rupiah($row->harga)</td> 
                           <td>{{ $row->transaksi->tgl_penjualan }}</td>
                           <td>{{ $row->transaksi->agen->nama_toko }}</td>
                        </tr>
                       @endforeach
                </tbody>
              </table>
              <br>
              {{ $penjualan->appends(Request::all())->links() }}
        </div>
    </div>
@endsection