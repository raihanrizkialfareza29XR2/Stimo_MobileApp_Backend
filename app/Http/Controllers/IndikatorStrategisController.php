<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\IndikatorStrategis;
use Illuminate\Http\Request;

class IndikatorStrategisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indikator = IndikatorStrategis::all();

        return view('admin.indikator.index', compact('indikator'));
    }

    public function apiIndex()
    {
        $indikator = IndikatorStrategis::all();

        if ($indikator->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($indikator);
        }
        
    }

    public function apiShow($id)
    {
        $indikator = IndikatorStrategis::where('id', $id)->first();

        if ($indikator->count() < 1) {
            return ResponseFormatter::error(null, 'No data found');
        } else {
            return ResponseFormatter::success($indikator);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.indikator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IndikatorStrategis::create([
            'title' => $request->title,
            'jumlah_indeks' => $request->jumlah_indeks,
            'isi_index' => $request->file('file')->store('indikator'),
        ]);

        return redirect()->route('indikator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indikator = IndikatorStrategis::where('id', $id)->first();

        return view('admin.indikator.detail', compact('indikator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indikator = IndikatorStrategis::where('id', $id)->first();

        return view('admin.indikator.edit', compact('indikator'));
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
        $indikator = IndikatorStrategis::where('id', $id)->first();
        if (!empty($request->file('file'))) {
            $indikator->update([
                'title' => $request->title,
                'jumlah_indeks' => $request->jumlah_indeks,
                'isi_index' => $request->file('file')->store('indikator'),
            ]);
        } else {
            $indikator->update([
                'title' => $request->title,
                'jumlah_indeks' => $request->jumlah_indeks,
            ]);
        }
        

        return redirect()->route('indikator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indikator = IndikatorStrategis::where('id', $id)->first();
        $indikator->delete();

        return redirect()->route('indikator.index');
    }
}
