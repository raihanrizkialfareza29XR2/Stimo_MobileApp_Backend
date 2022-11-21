@extends('layouts.dashboard')

@section('title')
    indikator
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit indikator</h1>
</div>

<!-- Content Row -->
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Edit indikator</div>
						<a href="{{ route('indikator.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('indikator.update', $indikator->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" value="{{ $indikator->title }}" class="form-control" name="title">
						</div>
						<div class="form-group">
							<label for="judul">Jumlah Index</label>
							<input type="text" value="{{ $indikator->jumlah_indeks }}" class="form-control" name="jumlah_indeks">
						</div>
						<div class="form-group">
							<label for="foto">File</label>
							<input type="file" class="form-control" name="file">
						</div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
@endsection