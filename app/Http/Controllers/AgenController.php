<?php

namespace App\Http\Controllers;

use App\Agen;

use Illuminate\Http\Request;

class AgenController extends Controller
{
    public function index()
    {
        $agens = Agen::orderBy('nama_toko', 'ASC')->paginate(10);
        $data_agen = Agen::all();
        $x = 0;
        foreach ($data_agen as $row) {
            $hasil[$x]['0'] = $row->nama_toko;
            $hasil[$x]['1'] = $row->latitude;
            $hasil[$x]['2'] = $row->longitude;
            $x++;
        }
        if (empty($hasil)) {
            $hasil_lat_long = json_encode([]);
        } else {
            $hasil_lat_long = json_encode($hasil);
        }

        $data_lokasi = Agen::first();
        if (empty($data_lokasi)) {
            $lokasi = (object) [
                'latitude' => '0.7893',
                'longitude' => '113.9213',
            ];
        } else {
            $lokasi = $data_lokasi;
        }
        return view('agen.index', compact('agens', 'hasil_lat_long', 'lokasi'));
    }
}
