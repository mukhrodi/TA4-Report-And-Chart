<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class PembeliController extends Controller
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
        $pembeli = Pembeli::all();
        return view('pembeli.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.create');
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
            'nama_lengkap'  => 'required',
            'username'      => 'required|max: 50|unique:pembeli',
            'password'      => 'required|min: 6',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required|max: 255'
        ])->validate();

        $data['password'] = Hash::make($request->input('password'));

        if ($request->file('foto_ktp')->isValid()) {
            $extension = $request->file('foto_ktp')->getClientOriginalExtension();
            $nama_foto = 'ktp/' . date('YmdHis') . "." . $extension;
            $upload_path = 'public/upload/ktp';
            $request->file('foto_ktp')->move($upload_path, $nama_foto);
            $data['foto_ktp'] = $nama_foto;
        }

        Pembeli::create($data);
        return redirect()->route('pembeli.index')->with('status', 'Pembeli Berhasil di Tambahkan');
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
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
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
        $pembeli = Pembeli::findOrFail($id);
        $data = $request->all();

        Validator::make($data, [
            'nama_lengkap'  => 'required',
            'password'      => 'sometimes|nullable|min:6',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required|max: 255'
        ])->validate();

        if ($request->input('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }

        if ($request->hasFile('foto_ktp')) {
            if ($request->file('foto_ktp')->isValid()) {
                Storage::disk('upload')->delete($pembeli->foto_ktp);
                $extension = $request->file('foto_ktp')->getClientOriginalExtension;
                $nama_foto = 'ktp/' . date('YmdHis') . "." . $extension;
                $upload_path = 'public/upload/ktp';
                $request->file('foto_ktp')->move($upload_path, $nama_foto);
                $data['foto_ktp'] = $nama_foto;
            }
        }

        $pembeli->update($data);
        return redirect()->route('pembeli.index')->with('status', 'Pembeli Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        Storage::disk('upload')->delete($pembeli->gambar_produk);
        return redirect()->route('pembeli.index')->with('status', 'Pembeli Berhasil di Hapus');
    }
}
