@extends('layouts.dashboard')

@section('title')
    Kandidat
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kandidat</h1>

    <a href="{{ route('grafik.create') }}" class="btn btn-primary" >Tambah Data</a>
</div>

<!-- Content Row -->
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
            @forelse ($grafik as $row)
                <tr>
                    <th>{{ $row->kategori }}</th>
                    <th class="text-center">
                        <a href="{{ route('grafik.show', $row->id) }}" class="btn btn-primary">Detail</a> | 
                        <form action="{{ route('grafik.destroy', $row->id) }}" method="POST" class="d-inline">
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