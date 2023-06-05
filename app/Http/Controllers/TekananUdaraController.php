<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TekananUdara;
use App\Models\Alat;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Barryvdh\DomPDF\Facade\PDF;


class TekananUdaraController extends Controller
{
    public function index()
    {
        $alats = Alat::all();
        $tekananudaras = TekananUdara::all();
        return view('tekananudara.index', compact('tekananudaras'));
    }

    public function create()
    {
        return view('tekananudara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required',
            'tekananudara' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $tekananudara = new TekananUdara([
            'id_alat' => $request->get('id_alat'),
            'tekananudara' => $request->get('tekananudara'),
            'waktu' => $request->get('waktu'),
        ]);
        $tekananudara->save();

        return redirect('/edittekanan')->with('success', 'Tekanan Udara has been added');
    }

    public function edit($id)
    {
        $tekananudara = TekananUdara::find($id);
        return view('tekananudara.edit', compact('tekananudara'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tekananudara' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $tekananudara = TekananUdara::find($id);
        $tekananudara->tekananudara = $request->get('tekananudara');
        $tekananudara->waktu = $request->get('waktu');
        $tekananudara->save();

        return view('edittekanan')->with('success', 'Tekanan Udara has been updated');
    }

    public function destroy($id)
    {
        $tekananudara = TekananUdara::find($id);
        $tekananudara->delete();

        return redirect('/edittekanan')->with('success', 'Tekanan Udara has been deleted');
    }

    public function exportPDF()
{
    $tekananudaras = TekananUdara::all();

    $pdf = PDF::loadView('tekananudara.pdf.export', compact('tekananudaras'));
    return $pdf->download('tekananudara.pdf');
}

public function tambahDataTekananUdara()
{
    // Fungsi untuk menghasilkan perbedaan tekanan udara antar jam
    function generateTekananUdaraDifference($tekananUdara, $range)
    {
        // Jika range = 0, tekanan udara tetap sama
        if ($range === 0) {
            return $tekananUdara;
        }

        // Menghasilkan perbedaan tekanan udara antar jam sekitar 3 naik atau turun
        $diff = mt_rand(-$range, $range);
        return $tekananUdara + $diff;
    }

    // Mendefinisikan rentang waktu dan interval
    $startDate = Carbon::parse('2023-03-01 00:00:00');
    $endDate = Carbon::parse('2023-06-01 23:00:00');
    $interval = CarbonInterval::hours(6);

    $currentDate = $startDate;
    while ($currentDate <= $endDate) {
        // Generate tekanan udara dengan perbedaan antar jam sekitar 3 naik atau turun
        $tekananUdara = generateTekananUdaraDifference(1013, 2);

        // Memasukkan data tekanan udara ke database
        TekananUdara::create([
            'id_alat' => 2,
            'tekananudara' => $tekananUdara,
            'waktu' => $currentDate,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $currentDate->add($interval);
    }

    return "Data tekanan udara berhasil ditambahkan.";
}

}
