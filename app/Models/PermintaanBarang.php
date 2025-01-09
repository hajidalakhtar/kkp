<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanBarang extends Model
{

    protected $table = "permintaan_barang";
    protected $guarded = [];


    public function product()
    {
        return $this->hasOne(Produk::class, 'id', 'id_barang');
    }
}
