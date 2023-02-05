<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kd_transaksi';
    protected $fillable = [
        'kd_produk',
        'tgl_transaksi',
        'jumlah',
        'bayar',
        'kd_pembeli',
        'status'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'kd_produk');
    }
}
