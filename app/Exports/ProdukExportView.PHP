<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Contracts\View\View;

class ProdukExportView implements FromView, WithEvents
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('produk.exportPdf', [
            'data' => $this->data
        ]);
    }
}