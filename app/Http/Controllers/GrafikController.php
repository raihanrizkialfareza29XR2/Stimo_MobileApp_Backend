<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Grafik;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grafik = Grafik::all();

        return view('admin.grafik.index', compact('grafik'));
    }
    
    public function apiIndex()
    {
        $grafik = Grafik::all();

        if ($grafik->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($grafik);
        }
        
    }

    public function apiShow($id)
    {
        $grafik = Grafik::where('id', $id)->first();

        if ($grafik->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($grafik);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grafik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Grafik::create([
            'kategori' => $request->kategori,
            'gambar_grafik' => $request->file('gambar')->store('grafik'),
            'file_grafik' => $request->file('file')->store('grafik'),
        ]);

        return redirect()->route('grafik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grafik = Grafik::where('id', $id)->first();

        return view('admin.grafik.detail', compact('grafik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grafik = Grafik::where('id', $id)->first();

        return view('admin.grafik.edit', compact('grafik'));
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
        $grafik = Grafik::where('id', $id)->first();
        if (!empty($request->file('gambar')) && !empty($request->file('file'))) {
            $grafik->update([
                'kategori' => $request->kategori,
                'gambar_grafik' => $request->file('gambar')->store('grafik'),
                'file_grafik' => $request->file('file')->store('grafik'),
            ]);
        } elseif (empty($request->file('gambar')) && !empty($request->file('file'))) {
            $grafik->update([
                'kategori' => $request->kategori,
                'file_grafik' => $request->file('file')->store('grafik'),
            ]);
        } elseif (!empty($request->file('gambar')) && empty($request->file('file'))) {
            $grafik->update([
                'kategori' => $request->kategori,
                'gambar_grafik' => $request->file('gambar')->store('grafik'),
            ]);
        } else {
            $grafik->update([
                'kategori' => $request->kategori,
            ]);
        }
        

        return redirect()->route('grafik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grafik = Grafik::where('id', $id)->first();
        $grafik->delete();

        return redirect()->route('grafik.index');
    }
}
