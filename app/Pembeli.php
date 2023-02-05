<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pembeli extends Authenticatable
{
    protected $guard = 'pembeli';

    protected $table = 'pembeli';
    protected $primaryKey = 'kd_pembeli';
    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'jenis_kelamin',
        'tgl_lahir',
        'tempat_lahir',
        'alamat',
        'foto_ktp'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
