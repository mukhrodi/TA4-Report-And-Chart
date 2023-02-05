@extends('layouts.template')
@section('title')
    Manage Pegawai
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
                   <a href=" {{ route('pegawai.create') }} " class="btn btn-block btn-primary">Tambah Data</a> 
                </div>
                <div class="col-sm-7"></div>
                 <div class="col-sm-4">
                    <form action=" {{ route('pegawai.index') }}" method="get" >
                        <div class="input-group input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama" value="{{Request::get('keyword')}}" >
                            <span class="input-group-append">
                              <button type="submit" class="btn btn-info btn-flat">Cari</button>
                            </span>
                          </div>
                    </form>
                 </div>
            </div>
            @if (Request::get('keyword'))
            <div class="alert alert-info" role="alert">
                Hasil Pencarian dari keyword: {{ Request::get('keyword') }}
            </div>
            @endif
           
            <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Username</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th style="width:30%">Action</th>
                  </tr>
                </thead>
                <tbody>
                       @foreach ($pegawai as $row)
                       <tr>
                       <td>{{ $loop->iteration + ($pegawai->perpage() * ($pegawai->currentPage() - 1 )) }}</td>
                           <td> {{ $row->username }} </td>
                           <td>{{ $row->nama_pegawai }}</td>
                           <td>{{ $row->jk }}</td>
                           <td>{{ $row->alamt }}</td>
                           <td>{{ $row->is_aktif }}</td>
                           <td>
                             <form action=" {{ route('pegawai.destroy', $row->username) }} " method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')" >
                               {{ method_field('DELETE') }}
                               @csrf
                               <a href="{{ route('pegawai.edit',$row->username) }} "  class="btn btn-warning"> Edit</a>
                               <button type="submit" class="btn btn-danger" > Delete</button>
                             </form>
                           </td>
                        </tr>
                       @endforeach
                </tbody>
              </table>
              <br>
              {{ $pegawai->appends(Request::all())->links() }}
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