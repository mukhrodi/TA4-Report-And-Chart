<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Produk;
use App\Kategori;

class ProdukController extends Controller
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
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
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
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar_produk' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ])->validate();

        if ($request->file('gambar_produk')->isValid()) {
            $extension = $request->file('gambar_produk')->getClientOriginalExtension();
            $nama_foto = 'produk/' . date('YmdHis') . "." . $extension;
            $upload_path = 'public/upload/produk';
            $request->file('gambar_produk')->move($upload_path, $nama_foto);
            $data['gambar_produk'] = $nama_foto;
        }

        $data['stok'] = '0';

        Produk::create($data);
        return redirect()->route('produk.index')->with('status', 'input data produk berhasil');
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
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
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
        $produk = Produk::findOrFail($id);
        $input = $request->all();
        Validator::make($input, [
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar_produk' => 'sometimes|nullable|image|mimes:jpg,png,jpeg|max:2048',
        ])->validate();

        if ($request->hasFile('gambar_produk')) {
            if ($request->file('gambar_produk')->isValid()) {
                Storage::disk('upload')->delete($produk->gambar_produk);
                $extension = $request->file('gambar_produk')->getClientOriginalExtension;
                $nama_foto = 'produk/' . date('YmdHis') . "." . $extension;
                $path = 'public/upload/produk';
                $request->file('gambar_produk')->move($path, $nama_foto);
                $input['gambar_produk'] = $nama_foto;
            }
        }
        $produk->update($input);
        return redirect()->route('produk.index')->with('status', 'Data produk berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->Delete();
        Storage::disk('upload')->delete($produk->gambar_produk);
        return redirect()->route('produk.index')->with('status', 'Data Produk Berhasil di Hapus');
    }
}
