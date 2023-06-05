<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;

class AlatController extends Controller
{
    public function index()
    {
        $alats = Alat::all();
        $alatList = Alat::pluck('nama_alat', 'id_alat');
        return view('alat.index', compact('alats','alatList'));
    }
    

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alat' => 'required',
            'id_lokasi' => 'required',
        ]);

        Alat::create($validatedData);

        return redirect('/editalat')->with('success', 'Data alat berhasil ditambahkan.');

    }

    public function show(Alat $alat)
    {
        return view('alat.show', compact('alat'));
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, $id_alat)
    {
        $alat = Alat::findOrFail($id_alat);
        $alat->alat = $request->input('alat');
        $alat->id_lokasi = $request->input('id_lokasi');
        $alat->save();
    
         return redirect('/editalat')->with('success', 'Data alat berhasil diperbarui');
    }
    
    public function destroy($id_alat)
    {
        $alat = Alat::findOrFail($id_alat);
        $alat->delete();
    
         return redirect('/editalat')->with('success', 'Data alat berhasil dihapus');
    }
    
    
}
