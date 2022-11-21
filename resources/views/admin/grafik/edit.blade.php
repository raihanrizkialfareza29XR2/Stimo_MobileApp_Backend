@extends('layouts.dashboard')

@section('title')
    grafik
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit grafik</h1>
</div>

<!-- Content Row -->
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Edit grafik</div>
						<a href="{{ route('grafik.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('grafik.update', $grafik->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
						<div class="form-group">
							<label for="judul">Kategori</label>
							<input type="text" value="{{ $grafik->kategori }}" class="form-control" name="kategori">
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