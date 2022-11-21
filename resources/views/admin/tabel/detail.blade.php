@extends('layouts.dashboard')

@section('title')
    Kandidat
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail tabel</h1>
</div>

<!-- Content Row -->
<div class="container">
    <div class="row d-flex">
        <div class="col-md-4" style="margin-left:-20px">
            <img src="{{ asset('/public/uploads/' . $tabel->gambar) }}" class="circular--square" width="200" alt="">
        </div>
        <div class="col-md-8 mt-3">
            <h1 class="text-center">{{ $tabel->title }}</h1>
            <h6 class="text-center">Preview Text</h6>
            <p class="text-center">{{ $tabel->preview_text }}}}</p>
            <hr>
            <h4 class="text-center">Gambar</h4>
            <img src="{{ asset('/public/uploads/' . $tabel->gambar) }}" alt="">
            <a href="{{ route('tabel.edit', $tabel->id) }}" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>
</div>
@endsection