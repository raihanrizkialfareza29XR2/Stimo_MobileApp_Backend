@extends('layouts.dashboard')

@section('title')
    publikasi
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah publikasi</h1>
</div>

<!-- Content Row -->
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Tambah publikasi</div>
						<a href="{{ route('publikasi.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" class="form-control" name="title">
						</div>
						<div class="form-group">
							<label for="judul">Kategori</label>
							<input type="text" class="form-control" name="kategori">
						</div>
						<div class="form-group">
							<label for="judul">Teks Abstrak</label>
							<input type="text" class="form-control" name="teks_abstrak">
						</div>
						<div class="form-group">
							<label for="judul">Nomor Katalog</label>
							<input type="text" class="form-control" name="nomor_katalog">
						</div>
						<div class="form-group">
							<label for="judul">Nomor Publikasi</label>
							<input type="text" class="form-control" name="nomor_publikasi">
						</div>
						<div class="form-group">
							<label for="judul">ISSN / ISBN Publikasi</label>
							<input type="text" class="form-control" name="is_publikasi">
						</div>
						<div class="form-group">
							<label for="judul">Tanggal Publikasi</label>
							<input type="text" class="form-control" name="tanggal_publikasi">
						</div>
						<div class="form-group">
							<label for="judul">Ukuran Publikasi</label>
							<input type="text" class="form-control" name="ukuran_publikasi">
						</div>
						<div class="form-group">
							<label for="foto">Foto</label>
							<input type="file" class="form-control" name="gambar">
						</div>
						<div class="form-group">
							<label for="foto">File</label>
							<input type="file" class="form-control" name="file">
						</div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
@endsection