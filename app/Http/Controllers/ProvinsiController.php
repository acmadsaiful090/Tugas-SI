<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::with('kotas')->get();
        dd($provinsis); // Periksa nilai $provinsis sebelum melewatkan ke view
        return view('index', compact('provinsis'));
    }
    
    

    public function create($provinsiId)
    {
        $provinsi = Provinsi::findOrFail($provinsiId);
        return view('nama_view', compact('provinsi'));
    }
    
    

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'provinsi' => 'required',
        ]);

        // Simpan data provinsi ke database
        $provinsi = new Provinsi;
        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();

        return redirect('/editprovinsi')->with('success', 'Data provinsi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'provinsi' => 'required',
        ]);
    
        // Temukan data provinsi berdasarkan ID
        $provinsi = Provinsi::findOrFail($id);
    
        // Update data provinsi di database
        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();
    
        return redirect('/editprovinsi')->with('success', 'Data provinsi berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        // Temukan data provinsi berdasarkan ID
        $provinsi = Provinsi::findOrFail($id);

        // Hapus data provinsi dari database
        $provinsi->delete();

        return redirect('/editprovinsi')->with('success', 'Data provinsi berhasil dihapus');

    }

    public function getKotaByProvinsi(Request $request)
    {
        $kotas = Kota::where('id_provinsi', $request->id_provinsi)->get();
        return response()->json($kotas);
    }
}
