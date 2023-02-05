@extends('layouts_admin.template')
@section('title')
Edit Produk
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
                        <form class="form-horizontal" method="post" action="  {{ route('produk.update',$produk->kd_produk) }} " enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT')  }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control {{ $errors->first('nama_produk') ? 'is-invalid' : '' }} " name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="{{ $produk->nama_produk }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nama_produk') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="kd_kategori" id="kd_kategori" class="form-control {{ $errors->first('kd_kategori') ? 'is-invalid' : '' }}">
                                            @foreach ($kategori as $row)
                                            <option value="{{ $row->kd_kategori }}" {{ $row->kd_kategori == $produk->kd_kategori ? 'selected' : '' }}> {{ $row->kategori }} </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kd_kategori') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control {{ $errors->first('harga') ? 'is-invalid' : '' }} " name="harga" id="harga" placeholder="Harga" value="{{ $produk->harga }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('harga') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gambar_produk" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset('upload/'.$produk->gambar_produk) }}" class="thumbnail mb-2" width="300" alt="">
                                        <input type="file" class="form-control {{ $errors->first('gambar_produk') ? 'is-invalid' : '' }} " name="gambar_produk" id="gambar_produk">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('gambar_produk') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block btn-primary">Update</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            @endsection