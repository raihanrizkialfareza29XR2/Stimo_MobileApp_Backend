<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataApiController extends Controller
{
    public function index()
    {
        $angkatan28s = DB::table('pemilih')->where('name', 'LIKE', '%'.'28'.'%')
               ->where('status' , 1)->count();
        $angkatan29s = DB::table('pemilih')->where('name', 'LIKE', '%'.'29'.'%')
                    ->where('status' , 1)->count();
        $angkatan30s = DB::table('pemilih')->where('name', 'LIKE', '%'.'30'.'%')
                    ->where('status' , 1)->count();
        $ang28 = DB::table('pemilih')->where('name', 'LIKE', '%'.'28'.'%')->count();
        $ang29 = DB::table('pemilih')->where('name', 'LIKE', '%'.'29'.'%')->count();
        $ang30 = DB::table('pemilih')->where('name', 'LIKE', '%'.'30'.'%')->count();
        $hitungs = $ang28 + $ang29 + $ang30;
        if ($ang28 != 0) {
            $hitung28 = ($angkatan28s / $hitungs) * 100;
        } else {
            $hitung28 = 0;
        }
        if ($ang29 != 0) {
            $hitung29 = ($angkatan29s / $hitungs) * 100;
        } else {
            $hitung29 = 0;
        }
        if ($ang30 != 0) {
            $hitung30 = ($angkatan30s / $hitungs) * 100;
        } else {
            $hitung30 = 0;
        }
        $api = [
            'ijlal' => Kandidat::select('jumlahsuara')->where('id', 1)->get(),
            'daiva' => Kandidat::select('jumlahsuara')->where('id', 2)->get(),
            'hit28' => $hit28 = round($hitung28),
            'hit29' => $hit29 = round($hitung29),
            'hit30' => $hit30 = round($hitung30)
        ];
    
        return response()->json($api);
    }
}
