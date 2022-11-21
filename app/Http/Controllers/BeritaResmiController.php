<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\BeritaResmi;
use Illuminate\Http\Request;

class BeritaResmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = BeritaResmi::all();

        return view('admin.berita_resmi.index', compact('berita'));
    }
    
    public function apiIndex()
    {
        $berita = BeritaResmi::all();

        if ($berita->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($berita);
        }
        
    }

    public function apiShow($id)
    {
        $berita = BeritaResmi::where('id', $id)->first();

        if ($berita->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($berita);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita_resmi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BeritaResmi::create([
            'title' => $request->title,
            'kategori' => $request->kategori,
            'preview_text' => $request->preview_text,
            'tanggal_rilis' => $request->tanggal_rilis,
            'ukuran_file' => $request->ukuran_file,
            'gambar' => $request->file('gambar')->store('berita'),
            'file' => $request->file('file')->store('berita'),
        ]);

        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = BeritaResmi::where('id', $id)->first();

        return view('admin.berita_resmi.detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = BeritaResmi::where('id', $id)->first();

        return view('admin.berita_resmi.edit', compact('berita'));
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
        $berita = BeritaResmi::where('id', $id)->first();
        if (!empty($request->file('gambar')) && !empty($request->file('file'))) {
            $berita->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'preview_text' => $request->preview_text,
                'tanggal_rilis' => $request->tanggal_rilis,
                'ukuran_file' => $request->ukuran_file,
                'gambar' => $request->file('gambar')->store('berita'),
                'file' => $request->file('file')->store('berita'),
            ]);
        } elseif (empty($request->file('gambar')) && !empty($request->file('file'))) {
            $berita->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'preview_text' => $request->preview_text,
                'tanggal_rilis' => $request->tanggal_rilis,
                'ukuran_file' => $request->ukuran_file,
                'file' => $request->file('file')->store('berita'),
            ]);
        } elseif (!empty($request->file('gambar')) && empty($request->file('file'))) {
            $berita->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'preview_text' => $request->preview_text,
                'tanggal_rilis' => $request->tanggal_rilis,
                'ukuran_file' => $request->ukuran_file,
                'gambar' => $request->file('gambar')->store('berita'),
            ]);
        } else {
            $berita->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'preview_text' => $request->preview_text,
                'tanggal_rilis' => $request->tanggal_rilis,
                'ukuran_file' => $request->ukuran_file,
            ]);
        }
        

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = BeritaResmi::where('id', $id)->first();
        $berita->delete();

        return redirect()->route('berita.index');
    }
}
