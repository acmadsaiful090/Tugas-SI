<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecepatanAngin;
use App\Models\Alat;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class KecepatanAnginController extends Controller
{
    public function index()
    {
        $alats = Alat::all();
        $kecepatanangin = KecepatanAngin::all();
        return view('kecepatanangin.index', compact('kecepatanangins'));
    }

    public function create()
    {
        return view('kecepatanangin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required',
            'kecepatanangin' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $kecepatanangin = new KecepatanAngin([
            'id_alat' => $request->get('id_alat'),
            'kecepatanangin' => $request->get('kecepatanangin'),
            'waktu' => $request->get('waktu'),
        ]);
        $kecepatanangin->save();

        return view('Data/editdataangin')->with('success', 'Tekanan Udara has been added');
    }

    public function edit($id)
    {
        $kecepatanangin = KecepatanAngin::find($id);
        return view('kecepatanangin.edit', compact('kecepatanangin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kecepatanangin' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $kecepatanangin = KecepatanAngin::find($id);
        $kecepatanangin->kecepatanangin = $request->get('kecepatanangin');
        $kecepatanangin->waktu = $request->get('waktu');
        $kecepatanangin->save();

        return view('Data/editdataangin')->with('success', 'Tekanan Udara has been updated');
    }

    public function destroy($id)
    {
        $kecepatanangin = KecepatanAngin::find($id);
        $kecepatanangin->delete();

        return view('Data/editdataangin')->with('success', 'Tekanan Udara has been deleted');
    }
    public function tambahDataKecepatanAngin()
{
    // Fungsi untuk menghasilkan perbedaan kecepatan angin antar jam
    function generateKecepatanAnginDifference($kecepatanAngin, $range)
    {
        // Jika range = 0, kecepatan angin tetap sama
        if ($range === 0) {
            return $kecepatanAngin;
        }

        // Menghasilkan perbedaan kecepatan angin antar jam sekitar 3 naik atau turun
        $diff = mt_rand(-$range, $range);
        return $kecepatanAngin + $diff;
    }

    // Mendefinisikan rentang waktu dan interval
    $startDate = Carbon::parse('2023-03-01 00:00:00');
    $endDate = Carbon::parse('2023-06-01 23:00:00');
    $interval = CarbonInterval::hours(6);

    $currentDate = $startDate;
    while ($currentDate <= $endDate) {
        // Generate kecepatan angin dengan perbedaan antar jam sekitar 3 naik atau turun
        $kecepatanAngin = generateKecepatanAnginDifference(10, 3);

        // Memasukkan data kecepatan angin ke database
        KecepatanAngin::create([
            'id_alat' => 2,
            'kecepatanangin' => $kecepatanAngin,
            'waktu' => $currentDate,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $currentDate->add($interval);
    }

    return "Data kecepatan angin berhasil ditambahkan.";
}

}
