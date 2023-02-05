<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;
use Auth;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kd_pembeli = Auth::user()->kd_pembeli;
        $transaksi = Transaksi::where('kd_pembeli', $kd_pembeli)->get();
        //$transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        // $supplier = Supplier::all();
        return view('transaksi.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'kd_produk'     => 'required',
            'tgl_transaksi' => 'required|date',
            'jumlah'        => 'required|numeric',
            'bayar'         => 'required|numeric',
        ])->validate();

        $data['kd_pembeli'] = Auth::user()->kd_pembeli;

        Transaksi::create($data);
        return redirect()->route('transaksi')->with('status', 'Transaksimu telah di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi_masuk = TransaksiMasuk::findOrFail($id);
        $jumlah = $transaksi_masuk->jumlah;
        $produk = Produk::find($transaksi_masuk->kd_produk);
        $data['stok'] = $produk->stok - $jumlah;
        $produk->update($data);
        $transaksi_masuk->delete();
        return redirect()->route('transaksi_masuk.index')->with('status', 'Transaksi Masuk Berhasil di Hapus');
    }
}
