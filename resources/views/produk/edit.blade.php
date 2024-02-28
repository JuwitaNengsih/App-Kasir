@extends('_template_back.layout')

@section('content')
<div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Selamat Datang Kembali!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Data Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Edit Data Produk</li>
                </ol>
            </nav>
        </div>

    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Silahkan isi form di bawah ini dengan lengkap!
                    </div>
                    <p class="mg-b-20"></p>
                    <div class="pd-30 pd-sm-40 bg-gray-100">
                        <form action="{{ route('produk.update', $dt->id) }}" method="post">
                            @csrf @method('put')
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Nama Produk</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan nama produk" name='nama_produk'
                                        value="{{ $dt->nama_produk }}" type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Harga</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan harga" name='harga'
                                        value="{{ $dt->harga }}" type="number">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Stok</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan no stok" name='stok'
                                        value="{{ $dt->stok }}" type="number">
                                </div>
                            </div>
                            <button class="btn ripple btn-primary" type="submit"><i class='fa fa-save'></i> Simpan </button>
                            <a href="{{ route('produk.index') }}" class="btn ripple btn-danger"><i
                                    class='fa fa-chevron-left'></i> Kembali </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection
