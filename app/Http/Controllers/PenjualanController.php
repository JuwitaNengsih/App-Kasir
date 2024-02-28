<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPenjualan = Penjualan::with('pelanggan')->paginate(10);
        return view ('penjualan.index', compact('dtPenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('pelanggan_id', $request->pelanggan_id);
        Session::flash('tanggal_penjualan', $request->tanggal_penjualan);
        Session::flash('total_harga', $request->total_harga);
        $request->validate(
            [
                'pelanggan_id' => 'required',
                'tanggal_penjualan' => 'required',
                'total_harga' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pelanggan wajib diisi',
                'tanggal_penjualan.required' => 'Tanggal penjualan wajib diisi',
                'total_harga.required' => 'Total harga wajib diisi',
            ],
        );
        $data = [
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $request->total_harga,
        ];

        Penjualan::create($data);
        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil di tambahkan');
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
        $dtPelanggan = Pelanggan::all();
        $dt = Penjualan::find($id);
        return view('penjualan.edit', compact('dt','dtPelanggan'));
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
        Session::flash('pelanggan_id', $request->pelanggan_id);
        Session::flash('tanggal_penjualan', $request->tanggal_penjualan);
        Session::flash('total_harga', $request->total_harga);
        $request->validate(
            [
                'pelanggan_id' => 'required',
                'tanggal_penjualan' => 'required',
                'total_harga' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pelanggan wajib diisi',
                'tanggal_penjualan.required' => 'Tanggal penjualan wajib diisi',
                'total_harga.required' => 'Total harga wajib diisi',
            ],
        );
        $data = [
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $request->total_harga,
        ];

        Penjualan::where('id', $id)->update($data);
        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::where('id', $id)->delete();
        return back()->with('success', 'Data penjualan berhasil di hapus');
    }
}