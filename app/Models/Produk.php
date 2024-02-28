<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $table = "produks";
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    // RELASI DARI MODEL PRODUK KE DETAIL PENJUALAN
    public function detail_penjualan()
    {
         return $this->hasMany(DetailPenjualan::class);
    }
}