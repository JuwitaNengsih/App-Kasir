@extends('_template_back.layout')

@section('content')
    <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">Hi, welcome back!</h4>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a   href="javascript:void(0);">Data Pelanggan</a></li>
								<li class="breadcrumb-item active" aria-current="page"> Form Data Pelanggan</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- /breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Form Input Data Pelanggan
								</div>
								<p class="mg-b-20">Harap untuk mengisi semua input!</p>
								<div class="pd-30 pd-sm-40 bg-gray-100">
                                <form action="{{ route('pelanggan.store') }}" method="post">
									@csrf
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Nama Pelanggan</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your nama pelanggan" name="nama pelanggan" type="text">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Alamat</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your alamat" name="alamat" type="text">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Nomor Telpon</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your nomor telpon" name="nomor telpon" type="integer">
										</div>
                                    </div>
									<button class="btn btn-primary pd-x-30 mg-e-5 mg-t-5" type="submit">Simpan</button>
									<a href="{{ route('pelanggan.index') }}" method="post" class="btn btn-dark pd-x-30 mg-t-5"> << Kembali </a>
                                </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
@endsection