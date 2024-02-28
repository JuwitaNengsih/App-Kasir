<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPelanggan = Pelanggan::with('penjualan')->paginate(10);
        return view ('pelanggan.index', compact('dtPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_pelanggan', $request->nama_pelanggan);
        Session::flash('alamat', $request->alamat);
        Session::flash('nomor_telpon', $request->nomor_telpon);
       
        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'nomor_telpon' => 'required|min:12|max:13',
            ],
            [
                'nama_pelanggan.required' => 'Nama Pelanggan wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'nomor_telpon.required' => 'No Telpon wajib diisi',
            ],
        );
        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telpon' => $request->nomor_telpon,
        ];
        Pelanggan::create($data);
        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil di tambahkan');
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
        $dt = Pelanggan::find($id);
        return view('pelanggan.form_edit', compact('dt'));
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
        Session::flash('nama_pelanggan', $request->nama_pelanggan);
        Session::flash('alamat', $request->alamat);
        Session::flash('nomor_telpon', $request->nomor_telpon);
       
        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'nomor_telpon' => 'required|min:12|max:13',
            ],
            [
                'nama_pelanggan.required' => 'Nama Pelanggan wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'nomor_telpon.required' => 'No Telpon wajib diisi',
            ],
        );
        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telpon,
        ];
        Pelanggan::where('id', $id)->update($data);
        return redirect()->route ('pelanggan.index')->with('success', 'Data pelanggan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::where('id', $id)->delete();
        return back()->with('success', 'Data pelanggan berhasil di hapus');
    }
}
