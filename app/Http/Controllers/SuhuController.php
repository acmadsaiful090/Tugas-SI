<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suhu;
use App\Models\Alat;
use Carbon\Carbon;
use Carbon\CarbonInterval;
class SuhuController extends Controller
{
    // public function index()
    // {
    //     $suhus = Suhu::all();
    //     $suhuTerbaru = Suhu::whereDate('waktu', Carbon::today())->avg('suhu');
    //     $suhuSebelumnya = Suhu::whereDate('waktu', Carbon::yesterday())->avg('suhu');

    //     $persentase = 0;
    //     $peningkatan = 'Tidak Ada Perubahan';

    //     if ($suhuTerbaru && $suhuSebelumnya) {
    //         $selisih = $suhuTerbaru - $suhuSebelumnya;
    //         $persentase = ($selisih / $suhuSebelumnya) * 100;

    //         if ($selisih > 0) {
    //             $peningkatan = 'Peningkatan';
    //         } elseif ($selisih < 0) {
    //             $peningkatan = 'Penurunan';
    //         }
    //     }
    //     $alats = Alat::all();
    //     return view('suhu.index', compact('suhus', 'suhuTerbaru', 'persentase', 'peningkatan','alats'));
    // }

    public function create()
    {
        return view('suhu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required',
            'suhu' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $suhu = new Suhu([
            'id_alat' => $request->get('id_alat'),
            'suhu' => $request->get('suhu'),
            'waktu' => $request->get('waktu'),
        ]);
        $suhu->save();

        return redirect('/editsuhu')->with('success', 'Suhu has been added');
    }

    public function edit($id)
    {
        $suhu = Suhu::find($id);
        return view('suhu.edit', compact('suhu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alat' => 'required',
            'suhu' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $suhu = Suhu::find($id);
        $suhu->id_alat = $request->get('id_alat');
        $suhu->suhu = $request->get('suhu');
        $suhu->waktu = $request->get('waktu');
        $suhu->save();

        return redirect('/editsuhu')->with('success', 'Suhu has been updated');
    }

    public function destroy($id)
    {
        $suhu = Suhu::find($id);
        $suhu->delete();

        return redirect('/editsuhu')->with('success', 'Suhu has been deleted');
    }

    public function tambahDataSuhu()
    {
        // Fungsi untuk menghasilkan perbedaan suhu antar jam
        function generateSuhuDifference($suhu, $range)
        {
            // Jika range = 0, suhu tetap sama
            if ($range === 0) {
                return $suhu;
            }

            // Menghasilkan perbedaan suhu antar jam sekitar 3 naik atau turun
            $diff = mt_rand(-$range, $range);
            return $suhu + $diff;
        }

        // Mendefinisikan rentang waktu dan interval
        $startDate = Carbon::parse('2023-03-01 00:00:00');
        $endDate = Carbon::parse('2023-06-01 23:00:00');
        $interval = CarbonInterval::hours(6);

        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            // Generate suhu dengan perbedaan antar jam sekitar 3 naik atau turun
            $suhu = generateSuhuDifference(43, 3);

            // Memasukkan data suhu ke database
            Suhu::create([
                'id_alat' => 2,
                'suhu' => $suhu,
                'waktu' => $currentDate,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $currentDate->add($interval);
        }

        return "Data suhu berhasil ditambahkan.";
    }

    
    
}
