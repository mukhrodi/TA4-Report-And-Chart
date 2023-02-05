<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agen;
use App\Http\Resources\AgenResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AgenResource::collection(Agen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = validator::make($input, [
            'nama_toko' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'alamat' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'gambar_toko' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'msg' => $validator->errors(),
            ], 200);
        }

        if ($request->file('gambar_toko')->isValid()) {
            $gambar = $request->file('gambar_toko');
            $extension = $gambar->getClientOriginalExtension();
            $nama_foto = "agen/" . date('YmdHis') . "." . $extension;
            $path = "public/upload/agen";
            $gambar->move($path, $nama_foto);
            $input['gambar_toko'] = $nama_foto;
        }

        if (Agen::create($input)) {
            //memberikan response berhasil
            return response()->json([
                'status' => TRUE,
                'msg' => 'Agen Berhasil di Simpan',
            ], 201);
        } else {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Agen Gagal di Simpan',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agen = Agen::find($id);
        if (is_null($agen)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record not Found',
            ], 404);
        }
        return new AgenResource($agen);
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
        $input = $request->all();
        $agen = Agen::find($id);
        if (is_null($agen)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record not Found',
            ], 404);
        }
        $validator = validator::make($input, [
            'nama_toko' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'alamat' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'gambar_toko' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'msg' => $validator->errors(),
            ], 400);
        }
        if ($request->hasFile('gambar_toko')) {
            if ($request->file('gambar_produk')->isValid()) {
                Storage::disk('upload')->delete($agen->gambar_toko);
                $gambar_toko = $request->file('gambar_toko');
                $ext = $gambar_toko->getClientOriginalExtension();
                $nama_foto = "agen/" . date('YmdHis') . "." . $ext;
                $upload_path = "public/upload/agen";
                $request->file('gambar_toko')->move($upload_path, $nama_foto);
                $input['gambar_toko'] = $nama_foto;
            }
        }
        $agen->update($input);
        return response()->json([
            'status' => TRUE,
            'msg' => 'Data Berhasil di Update',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agen = Agen::find($id);
        if (is_null($agen)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'Record not Found',
            ], 404);
        }
        $agen->delete();
        Storage::disk('upload')->delete($agen->gambar_toko);
        return response()->json([
            'status' => TRUE,
            'msg' => 'Data Berhasil di Hapus',
        ], 200);
    }

    public function search(Request $request)
    {
        $filterkeyword = $request->get('keyword');
        return AgenResource::collection(Agen::where('nama_toko', 'LIKE', "%$filterkeyword%")->get());
    }
}
