@extends('_template_back.layout')

@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Basic Tables</li>
            </ol>
        </nav>
    </div>
    
</div>
<!-- /breadcrumb -->
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex my-auto btn-list justify-content-end">
                    <!---------route create penjualan ------>
                  <a href="{{route('detail penjualan.create')}}" class="btn btn-primary">Tambah Data</a>
                  <!-- <a href="" class="btn btn-success">Export Excel</a>                
                  <a href="" class="btn btn-danger">Export PDF</a>
                  <a class="modal-effect btn btn-dark" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8">Import Excel</a> -->
                </div>
            </div>
            <div class="card-body mt-3"> 
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Penjualan ID</th>
                                <th>Produk ID</th>
                                <th>Jumlah Produk</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--/div-->
@endsection