<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    public $incrementing = false;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = [
        'kd_produk',
        'qty',
        'tgl_transaksi'
    ];
    protected $keyType = 'string';

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'kd_produk');
    }
}
