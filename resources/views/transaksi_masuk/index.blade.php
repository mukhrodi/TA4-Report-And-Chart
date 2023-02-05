@extends('layouts.template')
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
            <div class="row mb-4">
                <div class="col-sm-1 mb-2">
                   <a href=" {{ route('transaksi_masuk.create') }} " class="btn btn-block btn-primary">Tambah Data</a> 
                </div>
                <div class="col-sm-4"></div>
                 <div class="col-sm-7">
                  <form action=" {{ route('transaksi_masuk.index') }}" method="get" >
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="input-group input-group">
                          <input type="text" id="start_date" class="form-control" name="start_date" placeholder="Start Date" value="{{Request::get('start_date')}}" data-date-format="yyyy-mm-dd" readonly >
                          </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="input-group input-group">
                          <input type="text" id="end_date" class="form-control" name="end_date" placeholder="End Date" value="{{Request::get('end_date')}}" data-date-format="yyyy-mm-dd" readonly >
                        </div>
                      </div>
                      <div class="col-sm-2">
                          <button type="submit" class="btn btn-info btn-flat">Cari</button>
                      </div>
                    </div>
                </form>
                 </div>
            </div>
            @if (Request::get('start_date') != '' && Request::get('end_date') != '' )
            <div class="alert alert-info" role="alert">
                Hasil Pencarian dari Tanggal: {{ $start_date }} s/d {{ $end_date }}
            </div>
            @endif
           
            <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Produk</th>
                    <th>Supplier</th>
                    <th>Tgl Transaksi</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th style="width:30%">Action</th>
                  </tr>
                </thead>
                <tbody>
                       @foreach ($transaksi_masuk as $row)
                       <tr>
                       <td>{{ $loop->iteration + ($transaksi_masuk->perpage() * ($transaksi_masuk->currentPage() - 1 )) }}</td>
                           <td> {{ $row->produk->nama_produk }} </td>
                           <td>{{ $row->supplier->nama_supplier }}</td>
                           <td>{{ $row->tgl_transaksi }}</td>
                           <td>{{ $row->jumlah }}</td>
                           <td> @rupiah($row->harga)</td>
                           <td>
                           
                             <form action=" {{ route('transaksi_masuk.destroy',$row->kd_transaksi_masuk) }} " method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')" >
                               {{ method_field('DELETE') }}
                               @csrf
                               <button type="submit" class="btn btn-danger" > Delete</button>
                             </form>
                           </td>
                        </tr>
                       @endforeach
                </tbody>
              </table>
              <br>
              {{ $transaksi_masuk->appends(Request::all())->links() }}
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('adminlte')}}/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script>
    $('#start_date').click(function (e) { 
        $('#start_date').datepicker('show');
    });
    $('#end_date').click(function (e) { 
        $('#end_date').datepicker('show');
    });
</script>
<script>
  setTimeout(() => {
   $('#msg').alert('close')
}, 2000);
</script>

@endsection