@extends('layouts.template')
@section('title')
    Tambah Supplier
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datepicker/css/datepicker.css">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" {{ route('transaksi_masuk.index') }} " class="btn btn-block btn-success">Kembali</a> 
                    </div>
              </div> 
              <div class="row">
                 <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="{{ route('transaksi_masuk.store') }} "  >
                            @csrf
                          <div class="card-body">
                            <div class="form-group row">
                                <label for="kd_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                <select name="kd_produk" id="kd_produk" class="form-control {{ $errors->first('kd_produk') ? 'is-invalid' : '' }}" >
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->kd_produk }}"> {{ $p->nama_produk }} </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('kd_produk') }}
                                </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="nama_supplier" class="col-sm-3 col-form-label">Nama Suplier</label>
                                <div class="col-sm-9">
                                <select name="kd_supplier" id="kd_supplier" class="form-control {{ $errors->first('kd_supplier') ? 'is-invalid' : '' }}" >
                                    @foreach ($supplier as $s)
                                        <option value="{{ $s->kd_supplier }}"> {{ $s->nama_supplier }} </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('kd_supplier') }}
                                </div>
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label for="tgl_transaksi" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control {{ $errors->first('tgl_transaksi') ? 'is-invalid' : '' }} " name="tgl_transaksi" id="tgl_transaksi" placeholder="Tanggal Transaksi" value="{{ old('tgl_transaksi') }}"  data-date-format="yyyy-mm-dd" readonly >
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl_transaksi') }}
                                </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control {{ $errors->first('jumlah') ? 'is-invalid' : '' }} " name="jumlah" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}"  data-date-format="yyyy-mm-dd" >
                                <div class="invalid-feedback">
                                    {{ $errors->first('jumlah') }}
                                </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control {{ $errors->first('harga') ? 'is-invalid' : '' }} " name="harga" id="harga" placeholder="Harga" value="{{ old('harga') }}"  data-date-format="yyyy-mm-dd" >
                                <div class="invalid-feedback">
                                    {{ $errors->first('harga') }}
                                </div>
                                </div>
                              </div>

                            <div class="form-group row">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                                </div>
                            </div>
                         
                        </form>
                </div>
            </div>    
   </div>
@endsection
@section('js')
<script src="{{ asset('adminlte')}}/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script>
    $('#tgl_transaksi').click(function (e) { 
        $('#tgl_transaksi').datepicker('show');
    });

</script>
@endsection