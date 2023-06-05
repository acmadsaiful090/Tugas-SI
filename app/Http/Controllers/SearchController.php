<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Lokasi;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
            'kota' => 'required',
            'lokasi' => 'required'
        ]);

        $provinsi = Provinsi::findOrFail($request->provinsi);
        $kota = Kota::findOrFail($request->kota);
        $lokasi = Lokasi::findOrFail($request->lokasi);

        return view('cuaca', compact('provinsi', 'kota', 'lokasi'));
    }

    public function getKotaByProvinsi(Request $request)
    {
        if ($request->ajax()) {
            $kotas = Kota::where('id_provinsi', $request->id_provinsi)->get();
            return response()->json($kotas);
        }
    }

    public function getLokasiByKota(Request $request)
    {
        if ($request->ajax()) {
            $lokasis = Lokasi::where('id_kota', $request->id_kota)->get();
            return response()->json($lokasis);
        }
    }
}
