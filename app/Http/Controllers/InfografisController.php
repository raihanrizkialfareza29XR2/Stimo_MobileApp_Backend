<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Infografis;
use Illuminate\Http\Request;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infografis = Infografis::all();

        return view('admin.infografis.index', compact('infografis'));
    }

    public function apiIndex()
    {
        $infografis = Infografis::all();

        if ($infografis->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($infografis);
        }
        
    }

    public function apiShow($id)
    {
        $infografis = Infografis::where('id', $id)->first();

        if ($infografis->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($infografis);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infografis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Infografis::create([
            'title' => $request->title,
            'kategori' => $request->kategori,
            'gambar' => $request->file('gambar')->store('infografis'),
            'file' => $request->file('file')->store('infografis'),
        ]);

        return redirect()->route('infografis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infografis = Infografis::where('id', $id)->first();

        return view('admin.infografis.detail', compact('infografis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infografis = Infografis::where('id', $id)->first();

        return view('admin.infografis.edit', compact('infografis'));
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
        $infografis = Infografis::where('id', $id)->first();
        if (!empty($request->file('gambar')) && !empty($request->file('file'))) {
            $infografis->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'gambar' => $request->file('gambar')->store('infografis'),
                'file' => $request->file('file')->store('infografis'),
            ]);
        } elseif (empty($request->file('gambar')) && !empty($request->file('file'))) {
            $infografis->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'file' => $request->file('file')->store('infografis'),
            ]);
        } elseif (!empty($request->file('gambar')) && empty($request->file('file'))) {
            $infografis->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
                'gambar' => $request->file('gambar')->store('infografis'),
            ]);
        } else {
            $infografis->update([
                'title' => $request->title,
                'kategori' => $request->kategori,
            ]);
        }
        

        return redirect()->route('infografis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        $infografis->delete();

        return redirect()->route('infografis.index');
    }
}
