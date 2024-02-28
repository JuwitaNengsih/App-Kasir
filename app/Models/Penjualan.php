<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualans";
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

       /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL PENJUALAN KE DETAIL PEJUALAN 
    public function detail_penjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
     /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL PENJUALAN KE PELANGGAN
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

}
