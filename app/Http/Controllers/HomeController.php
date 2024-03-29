<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $produk = Produk::count();
        // //$agen = Agen::count();
        // $transaksi = TransaksiDetail::sum('jumlah');
        // $pendapatan = Transaksi::sum('total');
        // $nama_produk = [];
        // $jumlah_penjualan = [];
        // $data_produk = Produk::all();

        // foreach ($data_produk as $row) {
        //     $nama_produk[] = $row->nama_produk;
        //     $jumlah_transaksi = TransaksiDetail::where('kd_produk', $row->kd_produk)->sum('jumlah');
        //     $jumlah_penjualan[] = $jumlah_transaksi;
        // }
        // return view('home_admin', compact('produk', 'agen', 'transaksi', 'pendapatan', 'nama_produk', 'jumlah_penjualan'));
        return view('home');
    }
}
