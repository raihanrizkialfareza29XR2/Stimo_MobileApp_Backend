<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publikasi = Publikasi::all();

        return view('admin.publikasi.index', compact('publikasi'));
    }

    public function apiIndex()
    {
        $publikasi = Publikasi::all();

        if ($publikasi->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($publikasi);
        }
        
    }

    public function apiShow($id)
    {
        $publikasi = Publikasi::where('id', $id)->first();

        if ($publikasi->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($publikasi);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['gambar_publikasi'] = $request->file('gambar')->store('publikasi');
        $data['file_publikasi'] = $request->file('file')->store('publikasi');

        Publikasi::create($data);

        return redirect()->route('publikasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publikasi = Publikasi::where('id', $id)->first();

        return view('admin.publikasi.detail', compact('publikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publikasi = Publikasi::where('id', $id)->first();

        return view('admin.publikasi.edit', compact('publikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::where('id', $id)->first();
        if (!empty($request->file('gambar')) && !empty($request->file('file'))) {
            $publikasi->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'teks_abstrak' => $request->teks_abstrak,
                'nomor_katalog' => $request->nomor_katalog,
                'nomor_publikasi' => $request->nomor_publikasi,
                'is_publikasi' => $request->is_publikasi,
                'tanggal_publikasi' => $request->tanggal_publikasi,
                'ukuran_publikasi' => $request->ukuran_publikasi,
                'gambar_publikasi' => $request->file('gambar')->store('publikasi'),
                'file_publikasi' => $request->file('file')->store('publikasi'),
            ]);
        } elseif (empty($request->file('gambar')) && !empty($request->file('file'))) {
            $publikasi->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'teks_abstrak' => $request->teks_abstrak,
                'nomor_katalog' => $request->nomor_katalog,
                'nomor_publikasi' => $request->nomor_publikasi,
                'is_publikasi' => $request->is_publikasi,
                'tanggal_publikasi' => $request->tanggal_publikasi,
                'ukuran_publikasi' => $request->ukuran_publikasi,
                'file_publikasi' => $request->file('file')->store('publikasi'),
            ]);
        } elseif (!empty($request->file('gambar')) && empty($request->file('file_publikasi'))) {
            $publikasi->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'teks_abstrak' => $request->teks_abstrak,
                'nomor_katalog' => $request->nomor_katalog,
                'nomor_publikasi' => $request->nomor_publikasi,
                'is_publikasi' => $request->is_publikasi,
                'tanggal_publikasi' => $request->tanggal_publikasi,
                'ukuran_publikasi' => $request->ukuran_publikasi,
                'gambar_publikasi' => $request->file('gambar')->store('publikasi'),
            ]);
        } else {
            $publikasi->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'teks_abstrak' => $request->teks_abstrak,
                'nomor_katalog' => $request->nomor_katalog,
                'nomor_publikasi' => $request->nomor_publikasi,
                'is_publikasi' => $request->is_publikasi,
                'tanggal_publikasi' => $request->tanggal_publikasi,
                'ukuran_publikasi' => $request->ukuran_publikasi,
            ]);
        }
        

        return redirect()->route('publikasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publikasi = Publikasi::where('id', $id)->first();
        $publikasi->delete();

        return redirect()->route('publikasi.index');
    }
}
