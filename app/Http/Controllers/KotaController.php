<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Lokasi;

class KotaController extends Controller
{
    public function index()
    {
        $kotas = Kota::all();
        return view('kota.index', compact('kotas'));
    }

    public function create()
    {
        return view('kota.create');
    }

    public function store(Request $request)
    {
        $kota = new Kota;
        $kota->kota = $request->kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();

        return redirect('/editkota')->with('success', 'Data kota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kota = Kota::find($id);
        return view('kota.edit', compact('kota'));
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::find($id);
        $kota->kota = $request->kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();

        return redirect('/editkota')->with('success', 'Data kota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kota = Kota::find($id);
        $kota->delete();

        return redirect('/editkota')->with('success', 'Data kota berhasil dihapus.');
    }

    public function getLokasiByKota(Request $request)
    {
        $lokasis = Lokasi::where('id_kota', $request->id_kota)->get();
        return response()->json($lokasis);
    }
    public function getKotaByProvinsi(Request $request)
{
    $kotas = Kota::where('id_provinsi', $request->id_provinsi)->get();
        return response()->json(['kotas' => $kotas]);
}

}
