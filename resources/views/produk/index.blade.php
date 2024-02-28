@extends('_template_back.layout')

@section('content')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Selamat Datang!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Data Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Form Data Produk</li>
            </ol>
        </nav>
    </div>
</div>
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
        <div class="d-flex my-auto btn-list justify-content-end">
                <!---------route create produk ------>
                <a href="{{route('produk.create')}}" class="btn btn-primary">Tambah Data</a>
                <!-- <a href="" class="btn btn-success">Export Excel</a>  -->              
                <a href="" class="btn btn-danger">Export PDF</a>
               <!--<a class="modal-effect btn btn-dark" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8">Import Excel</a>-->
            </div>
        </div>
        <div class="card-body mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped mg-b-1 text-md-nowrap mb-3">
                    <thead>
                        <tr>
                            <th style="text-align: center" width="2px">No</th>
                            <th style="text-align: center" width="187px">Nama Produk</th>
                            <th style="text-align: center" width="187px">Harga</th>
                            <th style="text-align: center" width="187px">Stok</th>
                            <th style="text-align: center" width="2px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtProduk as $dt)
                            
                        
                        <tr>
                            <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                            <td style="text-align: center">{{ $dt->nama_produk}}</td>
                            <td style="text-align: center">{{ $dt->harga}}</td>
                            <td style="text-align: center">{{ $dt->stok}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('produk.destroy', $dt->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('produk.edit', $dt->id) }}"  data-bs-toggle="tooltip" title="Edit" class="btn btn-success btn-sm"><i  class="fa fa-edit"></i></a>
                                    <button type="submit"   data-bs-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dtProduk->links() }}
            </div>
        </div>
    </div>

</div>

@endsection