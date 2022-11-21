@extends('layouts.dashboard')

@section('title')
    Kandidat
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kandidat</h1>

    <a href="{{ route('indikator.create') }}" class="btn btn-primary" >Tambah Data</a>
</div>

<!-- Content Row -->
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Jumlah Index</th>
                <th class="text-center">Aksi</th>
            </tr>
            @forelse ($indikator as $row)
                <tr>
                    <th>{{ $row->title }}</th>
                    <th>{{ $row->jumlah_indeks }}</th>
                    <th class="text-center">
                        <a href="{{ route('indikator.show', $row->id) }}" class="btn btn-primary">Detail</a> | 
                        <form action="{{ route('indikator.destroy', $row->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Hapus
                            </button>

                        </form>
                    </th>
                </tr>
            @empty
                
            @endforelse
        </table>
    </div>
</div>
@endsection