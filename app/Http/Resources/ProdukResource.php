<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'kd_produk' => $this->kd_produk,
            'kd_kategori' => $this->kd_kategori,
            'nama_produk' => $this->nama_produk,
            'harga' => rupiah($this->harga),
            'gambar_produk' => env('ASSET_URL') . "/uploads/" . $this->gambar_produk,
            'stok' => $this->stok,
            'kategori' => $this->kategori->kategori,
        ];
    }
}
