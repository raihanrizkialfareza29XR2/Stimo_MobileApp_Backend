@extends('layouts.dashboard')

@section('title')
    Berita
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Berita</h1>
</div>

<!-- Content Row -->
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Tambah Berita</div>
						<a href="{{ route('berita.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" class="form-control" name="title">
						</div>
						<div class="form-group">
							<label for="judul">Tanggal Rilis</label>
							<input type="text" class="form-control" name="tanggal_rilis">
							<!-- <textarea name="visi" id="editor1"></textarea> -->
						</div>
						<div class="form-group">
							<label for="judul">Kategori</label>
							<input type="text" class="form-control" name="kategori">
						</div>
						<div class="form-group">
							<label for="judul">Ukuran File</label>
							<input type="text" class="form-control" name="ukuran_file">
						</div>
						<div class="form-group">
							<label for="judul">Preview Text</label>
							<input type="text" class="form-control" name="preview_text">
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