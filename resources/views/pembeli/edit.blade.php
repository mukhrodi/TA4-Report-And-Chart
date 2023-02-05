@extends('layouts_admin.template')
@section('title')
Edit User
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-1 mb-2">
            <a href=" {{ route('pembeli.index') }} " class="btn btn-block btn-success">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- form start -->
            <form class="form-horizontal" method="post" action=" {{ route('pembeli.update',$pembeli->kd_pembeli) }}" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT')  }}
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->first('nama_lengkap') ? 'is-invalid' : '' }} " name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="{{ $pembeli->nama_lengkap }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('nama_lengkap') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select id="jenis_kelamin" class="form-control {{ $errors->first('jenis_kelamin') ? 'is-invalid' : '' }} " name="jenis_kelamin">
                      <option value="laki-laki" {{ $pembeli->level == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                      <option value="perempuan" {{ $pembeli->level == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                      {{ $errors->first('jenis_kelamin') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->first('tempat_lahir') ? 'is-invalid' : '' }} " name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{  $pembeli->tempat_lahir  }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('tempat_lahir') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control {{ $errors->first('tgl_lahir') ? 'is-invalid' : '' }} " name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="{{  $pembeli->tgl_lahir  }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('tgl_lahir') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }} " name="username" id="username" placeholder="username" value="{{  $pembeli->username  }}" disabled>
                    <div class="invalid-feedback">
                      {{ $errors->first('username') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }} " id="password" name="password" placeholder="Password">
                    <div class="invalid-feedback">
                      {{ $errors->first('password') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control {{ $errors->first('alamat') ? 'is-invalid' : '' }} " id="alamat" name="alamat" placeholder="alamat">{{ $pembeli->alamat }}
                    </textarea>
                    <div class="invalid-feedback">
                      {{ $errors->first('password') }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                  <div class="col-sm-10">
                    <img src="{{ asset('upload/'.$pembeli->foto_ktp) }}" class="thumbnail mb-2" width="300" alt="">
                    <input type="file" class="form-control {{ $errors->first('foto_ktp') ? 'is-invalid' : '' }} " id="foto_ktp" name="foto_ktp" value="{{ old('foto_ktp') }}">
                    <div class="invalid-feedback">
                      {{ $errors->first('foto_ktp') }}
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