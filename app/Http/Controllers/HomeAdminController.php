<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Agen;
use App\Transaksi;
use App\TransaksiDetail;
use Carbon\Carbon;
class HomeAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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

        if (isset($_GET['select'])) {
            if ($_GET['select'] == 'day') {
                $label = [];
                $data_trx = [];
                $trx = [];

                foreach (Transaksi::where('tgl_transaksi','LIKE',Carbon::now()->format('Y-m').'%')->get() as $key => $value) {
                    try {
                        $trx[$value->tgl_transaksi] += $value->bayar;
                    } catch (\Throwable $th) {
                        $trx[$value->tgl_transaksi] = $value->bayar;
                    }
                }


                foreach ($trx as $key => $value) {
                    $label[] = $key;
                    $data_trx[] = $value;
                }

                return view('home_admin',['label'=>$label, 'data_trx'=>$data_trx]);
            } else if($_GET['select'] == 'month') {
                $label = [];
                $data_trx = [];
                $trx = [];
                foreach (Transaksi::all() as $key => $value) {
                    try {
                        $trx[date( 'Y-m', strtotime($value->tgl_transaksi))] += $value->bayar;
                    } catch (\Throwable $th) {
                        $trx[date( 'Y-m', strtotime($value->tgl_transaksi))] = $value->bayar;
                    }
                }


                foreach ($trx as $key => $value) {
                    $label[] = $key;
                    $data_trx[] = $value;
                }

                return view('home_admin',['label'=>$label, 'data_trx'=>$data_trx]);
            }
        } else {
            $label = [];
            $data_trx = [];
            $trx = [];
            foreach (Transaksi::all() as $key => $value) {
                try {
                    $trx[date( 'Y-m', strtotime($value->tgl_transaksi))] += $value->bayar;
                } catch (\Throwable $th) {
                    $trx[date( 'Y-m', strtotime($value->tgl_transaksi))] = $value->bayar;
                }
            }


            foreach ($trx as $key => $value) {
                $label[] = $key;
                $data_trx[] = $value;
            }

            return view('home_admin',['label'=>$label, 'data_trx'=>$data_trx]);
        }
    }
}
