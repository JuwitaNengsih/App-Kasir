<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Exports\ProdukExportView;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // PROSES MENGAMBIL DATA DARI MODEL LALU MENAMPILKAN
       $dtProduk = Produk::orderBy('id', 'desc')->paginate(10);
       return view('produk.index', compact('dtProduk')); // DI TAMPILKAN KE FOLDER PENGGUNA/INDEX
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_produk', $request->nama_produk);
        Session::flash('harga', $request->harga);
        Session::flash('stok', $request->stok);
       
        $request->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'stok' => 'required',
            ],
            [
                'nama_produk.required' => 'Nama Produk wajib diisi',
                'harga.required' => 'Harga wajib diisi',
                'stok.required' => 'Stok Telepon wajib diisi',
            ],
        );
        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        Produk::create($data);
        return redirect()->route ('produk.index')->with('success', 'Data produk berhasil di tambahkan');
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
        $dt = Produk::find($id);
        return view('produk.edit', compact('dt'));
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
        
        Session::flash('nama_produk', $request->nama_produk);
        Session::flash('harga', $request->harga);
        Session::flash('stok', $request->stok);
       
        $request->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'stok' => 'required',
            ],
            [
                'nama_produk.required' => 'Nama Produk wajib diisi',
                'harga.required' => 'Harga wajib diisi',
                'stok.required' => 'Stok Telepon wajib diisi',
            ],
        );
        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        Produk::where('id', $id)->update($data);
        return redirect()->route ('produk.index')->with('success', 'Data produk berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::where('id', $id)->delete();
        return back()->with('success', 'Data produk berhasil di hapus');
    }

    public function export_pdf()//membuat export pdf
    {
        $data = Produk::orderBy('nama', 'asc');
        $data = $data->get();

        $pdf = PDF::loadview('produk.exportPdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'potrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        //untuk memberi nama di file nya
        $filename = date('YmsdHis') . 'produk';
        // mendowload pdf
        return $pdf->download($filename.'.pdf');
    }
}
