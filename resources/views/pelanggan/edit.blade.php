@extends('_template_back.layout')

@section('content')
<div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Selamat Datang Kembali!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Data Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Edit Data Pelanggan </li>
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
                    @include('pesan.index')
                    <div class="pd-30 pd-sm-40 bg-gray-100">
                        <form action="{{ route('pelanggan.update', $dt->id) }}" method="post">
                        @csrf @method('put')
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Nama Pelanggan</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan nama pelanggan" name='nama_pelanggan'
                                        value="{{ $dt->nama_pelanggan }}" type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Alamat</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan alamat" name='alamat'
                                        value="{{ $dt->alamat }}" type="text">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">No Telepeon</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Masukan no telepon" name='nomor_telepon'
                                        value="{{ $dt->nomor_telepon }}" type="number">
                                </div>
                            </div>
                            <button class="btn ripple btn-primary" type="submit"><i class='fa fa-save'></i> Save </button>
                            <a href="{{ route('pelanggan.index') }}" method="post" class="btn ripple btn-danger"><i
                                    class='fa fa-chevron-left'></i> Back </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection