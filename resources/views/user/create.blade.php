@extends('layouts_admin.template')
@section('title')
Tambah User
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-1 mb-2">
            <a href=" {{ route('user.index') }} " class="btn btn-block btn-success">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- form start -->
            <form class="form-horizontal" method="post" action="  {{ route('user.store') }} ">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }} " name="name" id="name" placeholder="Nama" value="{{ old('name') }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('name') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }} " name="username" id="username" placeholder="username" value="{{ old('username') }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('username') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select id="jenis_kelamin" class="form-control {{ $errors->first('jenis_kelamin') ? 'is-invalid' : '' }} " name="jenis_kelamin">
                      <option value="laki-laki">Laki-Laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                      {{ $errors->first('jenis_kelamin') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }} " id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('email') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }} " id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('password') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Level</label>
                  <div class="col-sm-10">
                    <select id="level" class="form-control {{ $errors->first('level') ? 'is-invalid' : '' }} " name="level">
                      <option value="admin">Administrator</option>
                      <option value="staff">Staff</option>
                    </select>
                    <div class="invalid-feedback">
                      {{ $errors->first('level') }}
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