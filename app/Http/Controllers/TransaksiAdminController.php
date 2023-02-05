<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;
use Auth;
use Illuminate\Support\Facades\Validator;
use PDF;

class TransaksiAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = Transaksi::all();
        return view('transaksi_admin.index', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $data = $request->all();
        $data['status'] = 'dikonfirmasi';
        $transaksi->update($data);
        $produk = Produk::findOrFail($transaksi->kd_produk);
        $data_qty = $produk->stok;
        $qty_kurang = $transaksi->jumlah;
        $sisa = $data_qty - $qty_kurang;

        $update = [
            'stok' => $sisa
        ];
        $produk->update($update);
        return redirect()->route('transaksiadmin.index')->with('status', 'Konfirmasi berhasil');
    }

    public function cetak_pdf()
    {
    	$transaksi = Transaksi::all();

    	$pdf = PDF::loadview('transaksi_pdf',['transaksi'=>$transaksi]);
    	return $pdf->download('laporan-transaksi-pdf');
    }
}
