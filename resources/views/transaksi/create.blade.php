@extends('layouts.template')
@section('title')
Transaksi
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
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="{{ route('transaksi.store') }} ">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kd_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <select name="kd_produk" id="kd_produk" class="form-control {{ $errors->first('kd_produk') ? 'is-invalid' : '' }}">
                                            <option value=""> -Pilih- </option>
                                            @foreach ($produk as $p)
                                            <option value="{{ $p->kd_produk }}" data-harga="{{$p->harga}}"> {{ $p->nama_produk }} </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kd_produk') }}
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="harga" value="">

                                <div class="form-group row">
                                    <label for="tgl_transaksi" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control {{ $errors->first('tgl_transaksi') ? 'is-invalid' : '' }} " name="tgl_transaksi" id="tgl_transaksi" placeholder="Tanggal Transaksi" value="{{ old('tgl_transaksi') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('tgl_transaksi') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control {{ $errors->first('jumlah') ? 'is-invalid' : '' }} " name="jumlah" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}" data-date-format="yyyy-mm-dd">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('jumlah') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bayar" class="col-sm-3 col-form-label">Total Bayar</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control {{ $errors->first('bayar') ? 'is-invalid' : '' }} " name="bayar" id="bayar" placeholder="Total" value="{{ old('bayar') }}" readonly>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('bayar') }}
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

            <script>
                $('#kd_produk').change(function(e) {
                    var harga = $(this).find(':selected').data('harga')
                    $('#harga').val(harga);
                });

                $('#jumlah').change(function(e) {
                    var jumlah = $(this).val();
                    var harga = $('#harga').val();

                    var total = harga * jumlah;

                    $('#bayar').val(total);

                });
            </script>

            @endsection