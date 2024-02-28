@extends('_template_back.layout')

@section('content')
<div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Selamat Datang Kembali!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Data Penjualan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Edit Data Penjualan</li>
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
                        <form action="{{ route('penjualan.update', $dt->id) }}" method="post">
                            @csrf @method('put')
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Tanggal Penjualan</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan tanggal penjualan" name='tanggal_penjualan'
                                        value="{{ $dt->tanggal_penjualan }}" type="date">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Total Harga</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan total harga" name='total_harga'
                                        value="{{ $dt->total_harga }}" type="decimal">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Pelanggan ID</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan pelanggan id" name='pelanggan_id'
                                        value="{{ $dt->pelanggan_id }}" type="integer">
                                </div>
                            </div>
                            <button class="btn ripple btn-primary" type="submit"><i class='fa fa-save'></i> Simpan </button>
                            <a href="{{ route('penjualan.index') }}" class="btn ripple btn-danger"><i
                                    class='fa fa-chevron-left'></i> Kembali </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection