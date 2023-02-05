<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        if ($keyword) {
            $pegawai = Pegawai::where('username', 'like', "%$keyword%")->paginate(2);
        } else {
            $pegawai = Pegawai::paginate(2);
        }
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
            'username' => 'required|max:100|unique:pegawai',
            'password' => 'required|min:6',
            'nama_pegawai' => 'required|max:255',
            'jk' => 'required',
            'alamt' => 'required|max:255',
            'is_aktif' => 'required',
        ])->validate();

        $data['password'] = Hash::make($request->input('password'));

        Pegawai::create($data);
        return redirect()->route('pegawai.index')->with('status', 'Pegawai Berhasil di Tambahkan');
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
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
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
        $pegawai = Pegawai::findOrFail($id);
        $data = $request->all();
        Validator::make($data, [
            'nama_pegawai' => 'required|max:255',
            'jk' => 'required',
            'alamt' => 'required|max:255',
            'is_aktif' => 'required',
        ])->validate();
        if ($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        } else {
            $data = Arr::except($data, ['password']);
        }
        $pegawai->update($data);
        return redirect()->route('pegawai.index')->with('status', 'Pegawai Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('status', 'Pegawai Berhasil di Hapus');
    }
}
