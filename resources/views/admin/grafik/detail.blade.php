@extends('layouts.dashboard')

@section('title')
    Kandidat
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail grafik</h1>
</div>

<!-- Content Row -->
<div class="container">
    <div class="row d-flex">
        <div class="col-md-4" style="margin-left:-20px">
            <img src="{{ asset('/public/uploads/' . $grafik->gambar) }}" class="circular--square" width="200" alt="">
        </div>
        <div class="col-md-8 mt-3">
            <h1 class="text-center">{{ $grafik->kategori }}</h1>
            <hr>
            <h4 class="text-center">Gambar</h4>
            <img src="{{ asset('/storage/' . $grafik->gambar_grafik) }}" alt="">
            <a href="{{ route('grafik.edit', $grafik->id) }}" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>
</div>
@endsection