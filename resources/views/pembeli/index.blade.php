@extends('layouts_admin.template')
@section('title')
Pembeli
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
          <a href=" {{ route('pembeli.create') }} " class="btn btn-block btn-primary">Tambah Data</a>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir </th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Foto Ktp</th>
                <th style="width:30%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach ($pembeli as $row)
              <tr>
                <td>{{$no++}}</td>
                <td> {{ $row->nama_lengkap }} </td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>{{ $row->tempat_lahir }}</td>
                <td>{{ $row->tgl_lahir }}</td>
                <td>{{ $row->alamat }}</td>
                <td>
                  <img src="{{ asset('upload/'.$row->foto_ktp) }}" class="thumbnail" width="100" alt="">
                </td>
                <td>
                  <form action=" {{ route('pembeli.destroy',$row->kd_pembeli) }} " method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                    {{ method_field('DELETE') }}
                    @csrf
                    <a href="{{ route('pembeli.edit',$row->kd_pembeli) }} " class="btn btn-warning"> Edit</a>
                    <button type="submit" class="btn btn-danger"> Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('js')
  <script>
    setTimeout(() => {
      $('#msg').alert('close')
    }, 2000);
  </script>
  @endsection