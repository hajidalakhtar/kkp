<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PettyCash extends Model
{
//    protected $table = "petty_cash";
    protected $guarded = [];


    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'id_barang');
    }

}
