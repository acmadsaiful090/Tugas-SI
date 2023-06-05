<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Alat;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::all();

        return view('lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        $lokasi = new Lokasi();
        $lokasi->lokasi = $request->input('lokasi');
        $lokasi->id_kota = $request->input('id_kota');
        $lokasi->save();

        return redirect('/editlokasi')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->lokasi = $request->input('lokasi');
        $lokasi->id_kota = $request->input('id_kota');
        $lokasi->save();

        return redirect('/editlokasi')->with('success', 'Lokasi berhasil diperbarui');
    }

    public function destroy($id_lokasi)
    {
        $lokasi = Lokasi::findOrFail($id_lokasi);
        $lokasi->delete();

        return redirect('/editlokasi')->with('success', 'Lokasi berhasil dihapus');
    }
}
