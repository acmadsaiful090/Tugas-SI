<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelembaban;
use App\Models\Alat;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class KelembabanController extends Controller
{
    public function index()
    {
       
        $kelembabans = Kelembaban::all();
        $alats = Alat::all();
        return view('kelembaban.index', compact('kelembabans','alats'));
    }

    public function create()
    {
        return view('kelembaban.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required',
            'kelembaban' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $kelembaban = new Kelembaban([
            'id_alat' => $request->get('id_alat'),
            'kelembaban' => $request->get('kelembaban'),
            'waktu' => $request->get('waktu'),
        ]);
        $kelembaban->save();
        

        return redirect('/editkelembaban')->with('success', 'Tekanan Udara has been added');
    }

    public function edit($id)
    {
        $kelembaban = kelembaban::find($id);
        return view('kelembaban.edit', compact('kelembaban'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelembaban' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $kelembaban = kelembaban::find($id);
        $kelembaban->kelembaban = $request->get('kelembaban');
        $kelembaban->waktu = $request->get('waktu');
        $kelembaban->save();

        return redirect('/editkelembaban')->with('success', 'Tekanan Udara has been updated');
    }

    public function destroy($id)
    {
        $kelembaban = kelembaban::find($id);
        $kelembaban->delete();

        return redirect('/editkelembaban')->with('success', 'Tekanan Udara has been deleted');
    }

    public function tambahDataKelembaban()
{
    // Fungsi untuk menghasilkan perbedaan kelembaban antar jam
    function generateKelembabanDifference($kelembaban, $range)
    {
        // Jika range = 0, kelembaban tetap sama
        if ($range === 0) {
            return $kelembaban;
        }

        // Menghasilkan perbedaan kelembaban antar jam sekitar 3 naik atau turun
        $diff = mt_rand(-$range, $range);
        return $kelembaban + $diff;
    }

    // Mendefinisikan rentang waktu dan interval
    $startDate = Carbon::parse('2023-03-01 00:00:00');
    $endDate = Carbon::parse('2023-06-01 23:00:00');
    $interval = CarbonInterval::hours(6);

    $currentDate = $startDate;
    while ($currentDate <= $endDate) {
        // Generate kelembaban dengan perbedaan antar jam sekitar 3 naik atau turun
        $kelembaban = generateKelembabanDifference(80, 5);

        // Memasukkan data kelembaban ke database
        Kelembaban::create([
            'id_alat' => 2,
            'kelembaban' => $kelembaban,
            'waktu' => $currentDate,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $currentDate->add($interval);
    }

    return "Data kelembaban berhasil ditambahkan.";
}

}
