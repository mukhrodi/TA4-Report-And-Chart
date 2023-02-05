@extends('layouts_admin.template')
@section('title')
Edit Kategori
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" {{ route('kategori.index') }} " class="btn btn-block btn-success">Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="  {{ route('kategori.update',$kategori->kd_kategori) }} " enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control {{ $errors->first('kategori') ? 'is-invalid' : '' }} " name="kategori" id="kategori" placeholder="Nama Supplier" value="{{ $kategori->kategori }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kategori') }}
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