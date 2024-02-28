<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view ('detail_penjualan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $penjualan = Penjualan::with('pelanggan')->get();
        return view ('detail_penjualan.create',compact('produk','penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $request->validate(
            [
                'penjualan_id' => 'required',
                'produk_id' => 'required',
                'jumlah_produk' => 'required',
                'subtotal' => 'required',
            ],
            [
                'penjualan_id.required' => 'penjualan_id wajib diisi',
                'produk_id.required' => 'produk_id wajib diisi',
                'jumlah_produk.required' => 'jumlah_produk wajib diisi',
                'subtotal.required' => 'subtotal wajib diisi',
            ],
        );

        $detail = [
            'penjualan_id' => $request->penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => $request->subtotal,

        ];

        DetailPenjualan::create($detail);
        return redirect()
            ->route('detail penjualan.index')
            ->with('success', 'Data detail penjualan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
