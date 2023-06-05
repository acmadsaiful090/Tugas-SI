<?php
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Lokasi;
use App\Models\Suhu;
use App\Models\TekananUdara;
use App\Models\Kelembaban;
use App\Models\KecepatanAngin;
use App\Models\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SuhuController;
use App\Http\Controllers\TekananUdaraController;
use App\Http\Controllers\KelembabanController;
use App\Http\Controllers\KecepatanAnginController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Alat;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

Route::get('/', function () {
    $suhus = suhu::all();
    $suhuTerbaru = Suhu::whereDate('waktu', Carbon::today())->avg('suhu');
    $suhuSebelumnya = Suhu::whereDate('waktu', Carbon::yesterday())->avg('suhu');
    $persentase = 0;
    $peningkatan = 'Tidak Ada Perubahan';

    // Calculate the percentage difference between suhuTerbaru and suhuSebelumnya
    if ($suhuTerbaru && $suhuSebelumnya) {
        $selisih = $suhuTerbaru - $suhuSebelumnya;
        $persentase = ($selisih / $suhuSebelumnya) * 100;

        if ($selisih > 0) {
            $peningkatan = 'Peningkatan';
        } elseif ($selisih < 0) {
            $peningkatan = 'Penurunan';
        }
    }
    // Retrieve all Provinsi records from the database
    $provinsis = App\Models\Provinsi::all();

    // Return the 'index' view and pass data to it
    return view('index', compact('provinsis', 'suhuTerbaru', 'persentase', 'peningkatan'));
});



Route::get('/editprovinsi', function(){
    $provinsis = Provinsi::all();
    return view('Data/editdataprovinsi', compact('provinsis'));
});

Route::get('/editkota', function(){
    $provinsis = Provinsi::all();
    $kotas = Kota::all();
    
    return view('Data/editdatakota', compact('provinsis', 'kotas'));
});


Route::get('/editlokasi', function(){
    $provinsis = Provinsi::all();
    $kotas = Kota::all();
    $lokasis = Lokasi::all();
    return view('Data/editdatalokasi',compact('provinsis', 'kotas','lokasis'));
});






Route::get('/editangin', function(){
    $kecepatanangins = KecepatanAngin::all();
    $alats = Alat::all();
    return view('Data/editdataangin', compact('alats','kecepatanangins'));
});

Route::get('/kecepatanangins', [KecepatanAnginController::class, 'index'])->name('kecepatanangins.index');
Route::get('/kecepatanangins/create', [KecepatanAnginController::class, 'create'])->name('kecepatanangins.create');
Route::post('/kecepatanangins', [KecepatanAnginController::class, 'store'])->name('kecepatanangins.store');
Route::get('/kecepatanangins/{id}/edit', [KecepatanAnginController::class, 'edit'])->name('kecepatanangins.edit');
Route::delete('/kecepatanangins/{id_kecepatanangin}', [KecepatanAnginController::class, 'destroy'])->name('kecepatanangins.destroy');
Route::put('/kecepatanangins/{id_kecepatanangin}', [KecepatanAnginController::class, 'update'])->name('kecepatanangins.update');
Route::get('/tambah-kcangin', [KecepatanAnginController::class, 'tambahDataKecepatanAngin']);

Route::get('/editalat', function(){
    $alats = Alat::all();
    $lokasis = Lokasi::all();
    return view('Data/editalat', compact('alats','lokasis'));
});

Route::get('/reportsuhu', function(){
    $suhus = Suhu::all();
    $alats = Alat::all();
    return view('report/reportsuhu', compact('suhus','alats'));
});

Route::get('/reportkelembaban', function(){
    $kelembabans = Kelembaban::all();
    return view('report/reportkelembaban', compact('kelembabans'));
});

Route::get('/reporttekanan', function(){
    $tekananudaras = TekananUdara::all();
    return view('report/reporttekananudara', compact('tekananudaras'));
});

Route::get('/reportangin', function(){
    $kecepatanangins = KecepatanAngin::all();
    return view('report/reportangin', compact('kecepatanangins'));
});

Route::get('/reportalat', function(){
    $alats = Alat::all();
    return view('report/reportalat', compact('alats'));
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.submit');
Route::post('/register', [UserController::class, 'register']);

Route::get('/log', function(){
    $suhus = Suhu::all();
    return view('log', compact('suhus'));
});

Route::get('/Session', function(){
    $sessions = Session::all();
    return view('session', compact('sessions'));
});

Route::put('/sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');
Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');

Route::get('/getKotaByProvinsi', [ProvinsiController::class, 'getKotaByProvinsi'])->name('getKotaByProvinsi');
Route::get('/getLokasiByKota', [KotaController::class, 'getLokasiByKota'])->name('getLokasiByKota');


Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi.index');
Route::get('/provinsi/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
Route::post('/provinsi', [ProvinsiController::class, 'store'])->name('provinsi.store');
Route::get('/provinsi/{id}/edit', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
Route::put('/provinsi/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');

Route::get('/kota', [kotaController::class, 'index'])->name('kota.index');
Route::get('/kota/create', [kotaController::class, 'create'])->name('kota.create');
Route::post('/kota', [kotaController::class, 'store'])->name('kota.store');
Route::get('/kota/{id}/edit', [kotaController::class, 'edit'])->name('kota.edit');
Route::put('/kota/{id}', [kotaController::class, 'update'])->name('kota.update');
Route::delete('/kota/{id}', [kotaController::class, 'destroy'])->name('kota.destroy');



Route::get('/lokasi', [lokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [lokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi', [lokasiController::class, 'store'])->name('lokasi.store');
Route::get('/lokasi/{id}/edit', [lokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/{id}', [lokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{id}', [lokasiController::class, 'destroy'])->name('lokasi.destroy');

Route::get('/editsuhu', function (Request $request) {
    $suhus = Suhu::all();
    $alats = Alat::all();
   
    return view('Data/editdatasuhu', compact('suhus', 'alats'));
});

Route::get('/suhu', [SuhuController::class, 'index'])->name('suhu.index');
Route::get('/suhus/create', [SuhuController::class, 'create'])->name('suhus.create');
Route::post('/suhus', [SuhuController::class, 'store'])->name('suhus.store');
Route::get('/suhus/{id}/edit', [SuhuController::class, 'edit'])->name('suhus.edit');
Route::delete('/suhus/{id_suhu}', [SuhuController::class, 'destroy'])->name('suhus.destroy');
Route::put('/suhus/{id_suhu}', [SuhuController::class, 'update'])->name('suhus.update');
Route::get('/tambah-suhu', [SuhuController::class, 'tambahDataSuhu']);

Route::get('/edittekanan', function(){
    $tekananudaras = TekananUdara::all();
    $alats = Alat::all();
    return view('Data/editdatatekanan', compact('alats','tekananudaras'));
});

Route::get('/tambah-data-tekanan-udara',[tekananudaraController::class, 'tambahDataTekananUdara'],);
Route::get('/tekananudaras', [tekananudaraController::class, 'index'])->name('tekananudaras.index');
Route::get('/tekananudaras/create', [tekananudaraController::class, 'create'])->name('tekananudaras.create');
Route::post('/tekananudaras', [tekananudaraController::class, 'store'])->name('tekananudaras.store');
Route::get('/tekananudaras/{id}/edit', [tekananudaraController::class, 'edit'])->name('tekananudaras.edit');
Route::delete('/tekananudaras/{id_tekananudara}', [tekananudaraController::class, 'destroy'])->name('tekananudaras.destroy');
Route::put('/tekananudaras/{id_tekananudara}', [tekananudaraController::class, 'update'])->name('tekananudaras.update');

Route::get('/editkelembaban', function(){
    $kelembabans = Kelembaban::all();
    $alats = Alat::all();
    return view('Data/editdatakelembaban', compact('alats','kelembabans'));
});
Route::get('/kelembabans', [KelembabanController::class, 'index'])->name('kelembabans.index');
Route::get('/kelembabans/create', [KelembabanController::class, 'create'])->name('kelembabans.create');
Route::post('/kelembabans', [KelembabanController::class, 'store'])->name('kelembabans.store');
Route::get('/kelembabans/{id}/edit', [KelembabanController::class, 'edit'])->name('kelembabans.edit');
Route::delete('/kelembabans/{id_kelembaban}', [KelembabanController::class, 'destroy'])->name('kelembabans.destroy');
Route::put('/kelembabans/{id_kelembaban}', [KelembabanController::class, 'update'])->name('kelembabans.update');
Route::get('/tambah-kelembaban', [KelembabanController::class, 'tambahDataKelembaban']);


Route::get('/alats', [AlatController::class, 'index'])->name('alats.index');
Route::get('/alats/create', [AlatController::class, 'create'])->name('alats.create');
Route::post('/alats', [AlatController::class, 'store'])->name('alats.store');
Route::get('/alats/{id}/edit', [AlatController::class, 'edit'])->name('alats.edit');
Route::delete('/alats/{id_alat}', [AlatController::class, 'destroy'])->name('alats.destroy');
Route::put('/alats/{id_alat}', [AlatController::class, 'update'])->name('alats.update');




