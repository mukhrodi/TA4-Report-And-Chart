@extends('layouts.template')
@section('title')
    Tambah Pegawai
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 mb-2">
                        <a href=" {{ route('pegawai.index') }} " class="btn btn-block btn-success">Kembali</a> 
                    </div>
              </div> 
              <div class="row">
                 <div class="col-sm-6">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="  {{ route('pegawai.store') }} "  >
                            @csrf
                          <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }} " name="username" id="username" placeholder="Nama Supplier" value="{{ old('username') }}" >
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }} " name="password" id="password" placeholder="Password" value="{{ old('password') }}" >
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->first('nama_pegawai') ? 'is-invalid' : '' }} " name="nama_pegawai" id="nama_pegawai" placeholder="Nama Supplier" value="{{ old('nama_pegawai') }}" >
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_pegawai') }}
                                </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jk" id="jk" class="form-control {{ $errors->first('jk') ? 'is-invalid' : '' }}">
                                         <option value="PRIA">PRIA</option>
                                         <option value="WANITA">WANITA</option>
                                    </select>
                                    {{ $errors->first('jk') }}
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                    <textarea  name="alamt" id="alamt" class="form-control {{ $errors->first('alamt') ? 'is-invalid' : '' }} " cols="30" rows="4" placeholder="Alamat">{{ old('alamt') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('alamt') }}
                                    </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="is_aktif" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="is_aktif" id="is_aktif" class="form-control {{ $errors->first('is_aktif') ? 'is-invalid' : '' }}">
                                         <option value="1">Aktif</option>
                                         <option value="0">Tidak Aktif</option>
                                    </select>
                                    {{ $errors->first('is_aktif') }}
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