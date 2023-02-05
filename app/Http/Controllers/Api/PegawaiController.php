<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Pegawai;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PegawaiResource;

class PegawaiController extends Controller
{
    public function login_pegawai(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'msg' => $validator->errors(),
            ], 404);
        }
        $username = $request->input('username');
        $password = $request->input('password');

        $pegawai = Pegawai::where([
            ['username', $username],
            ['is_aktif', 1],
        ])->first();

        if (is_null($pegawai)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'username tidak di temukan',
            ], 200);
        } else {
            if (Hash::check($password, $pegawai->password)) {
                return response()->json([
                    'status' => TRUE,
                    'msg' => 'Username di temukan',
                    'pegawai' => new PegawaiResource($pegawai),
                ], 200);
            } else {
                return response()->json([
                    'status' => FALSE,
                    'msg' => 'username dan password tidak cocok',
                ], 200);
            }
        }
    }
}
