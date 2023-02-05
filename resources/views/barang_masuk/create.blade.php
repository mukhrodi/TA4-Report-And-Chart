@extends('layouts_admin.template')
@section('title')
Tambah Transaksi Barang Masuk
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" {{ route('produk.index') }} " class="btn btn-block btn-success">Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="  {{ route('brgmasuk.store') }} " enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Pilih Produk</label>
                                    <div class="col-sm-10">
                                        <select name="kd_produk" id="kd_produk" class="form-control {{ $errors->first('kd_produk') ? 'is-invalid' : '' }}">
                                            <option value=""> -Pilih- </option>
                                            @foreach ($produk as $row)
                                            <option value="{{ $row->kd_produk }}"> {{ $row->nama_produk }} </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kd_produk') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="qty" class="col-sm-2 col-form-label">Qty Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control {{ $errors->first('qty') ? 'is-invalid' : '' }} " name="qty" id="qty" placeholder="masukkan qty" value="{{ old('qty') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('qty') }}
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