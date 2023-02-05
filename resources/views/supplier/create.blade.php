@extends('layouts.template')
@section('title')
    Tambah Supplier
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" {{ route('supplier.index') }} " class="btn btn-block btn-success">Kembali</a> 
                    </div>
              </div> 
              <div class="row">
                 <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="  {{ route('supplier.store') }} "  >
                            @csrf
                          <div class="card-body">
                            <div class="form-group row">
                                <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->first('nama_supplier') ? 'is-invalid' : '' }} " name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="{{ old('nama_supplier') }}" >
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_supplier') }}
                                </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat Supplier</label>
                                    <div class="col-sm-10">
                                    <textarea  name="alamat_supplier" id="alamat_supplier" class="form-control {{ $errors->first('alamat_supplier') ? 'is-invalid' : '' }} " cols="30" rows="4" placeholder="Alamat Supplier">{{ old('alamat_supplier') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('alamat_supplier') }}
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