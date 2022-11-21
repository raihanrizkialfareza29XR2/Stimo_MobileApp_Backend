<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Tabel;
use Illuminate\Http\Request;

class TabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabel = Tabel::all();

        return view('admin.tabel.index', compact('tabel'));
    }

    public function apiIndex()
    {
        $tabel = Tabel::all();

        if ($tabel->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($tabel);
        }
        
    }

    public function apiShow($id)
    {
        $tabel = Tabel::where('id', $id)->first();

        if ($tabel->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($tabel);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tabel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tabel::create([
            'title' => $request->title,
            'kategori' => $request->kategori,
            'gambar' => $request->file('gambar')->store('tabel'),
            'file' => $request->file('file')->store('tabel'),
        ]);

        return redirect()->route('tabel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabel = Tabel::where('id', $id)->first();

        return view('admin.tabel.detail', compact('tabel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabel = Tabel::where('id', $id)->first();

        return view('admin.tabel.edit', compact('tabel'));
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
        $tabel = Tabel::where('id', $id)->first();
        if (!empty($request->file('gambar')) && !empty($request->file('file'))) {
            $tabel->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'gambar' => $request->file('gambar')->store('tabel'),
                'file' => $request->file('file')->store('tabel'),
            ]);
        } elseif (empty($request->file('gambar')) && !empty($request->file('file'))) {
            $tabel->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'file' => $request->file('file')->store('tabel'),
            ]);
        } elseif (!empty($request->file('gambar')) && empty($request->file('file'))) {
            $tabel->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'gambar' => $request->file('gambar')->store('tabel'),
            ]);
        } else {
            $tabel->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
            ]);
        }
        

        return redirect()->route('tabel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabel = Tabel::where('id', $id)->first();
        $tabel->delete();

        return redirect()->route('tabel.index');
    }
}
