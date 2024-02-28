<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = "detail_penjualans";
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL DETAIL PENJUALAN KE PENJUALAN
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
    // RELASI DARI MODEL DETAIL PENJUALAN KE PRODUK
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
