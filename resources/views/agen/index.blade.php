@extends('layouts.template')
@section('title')
    Data Agen
@endsection
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama Toko</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Gambar Toko</th>
                  </tr>
                </thead>
                <tbody>
                       @foreach ($agens as $agen)
                       <tr>
                       <td>{{ $loop->iteration + ($agens->perpage() * ($agens->currentPage() - 1 )) }}</td>
                           <td> {{ $agen->nama_toko }} </td>
                           <td>{{ $agen->nama_pemilik }}</td>
                           <td> {{ $agen->alamat }}</td>
                        <td>{{ $agen->latitude }}</td>
                        <td>{{ $agen->longitude }}</td>
                       <td><img src="{{ asset('upload/'.$agen->gambar_toko) }}" width="100"  alt="" class="img-thumbnail" >
                    </td>
                        </tr>
                       @endforeach
                </tbody>
              </table>
              <br>
              {{ $agens->appends(Request::all())->links() }}
              <div id="mapid" style="width:100%;height:400px"></div>
        </div>
    </div>
@endsection
@section('js')
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
      integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
      crossorigin=""></script> 
      <script>
        let locations = <?php echo $hasil_lat_long; ?>;
        var mymap = L.map('mapid').setView([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}], 18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
        }).addTo(mymap);
        for (let i = 0; i < locations.length; i++) {
          var marker = L.marker([51.5, -0.09]).bindPopup(locations[i][0]).addTo(mymap);
        }
      </script>
@endsection