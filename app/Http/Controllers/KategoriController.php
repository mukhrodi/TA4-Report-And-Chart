<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class KategoriController extends Controller
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

        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required|max:255',
        ])->validate();

        // $gambar_kategori = $request->file('gambar_kategori');
        // $extension = $gambar_kategori->getClientOriginalExtension();
        // if ($request->file('gambar_kategori')->isValid()) {
        //     $namaFoto = "kategori/" . date('YmdHis') . "." . $extension;
        //     $upload_path = 'public/upload/kategori';
        //     $request->file('gambar_kategori')->move($upload_path, $namaFoto);
        //     $data['gambar_kategori'] = $namaFoto;
        // }
        Kategori::create($data);
        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil di Tambahkan');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);
        $data = $request->all();
        Validator::make($data, [
            'kategori' => 'required|max:255',
        ])->validate();

        $kategori->update($data);
        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil di Hapus');
    }
}
