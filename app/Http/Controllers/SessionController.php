<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function update(Request $request, Session $session)
    {
        // Validasi input jika diperlukan
        // ...

        // Update data sesi
        $session->update($request->all());

        // Redirect ke halaman yang diinginkan setelah update
        return redirect()->back()->with('success', 'Data sesi berhasil diperbarui');
    }

    public function destroy(Session $session)
    {
        // Hapus data sesi
        $session->delete();

        // Redirect ke halaman yang diinginkan setelah hapus
        return redirect()->back()->with('success', 'Data sesi berhasil dihapus');
    }
}
