<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
class UserController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }


    
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Login berhasil
            $user = Auth::user();
    
            // Mencatat sesi baru dalam tabel "sessions"
            $session = new Session();
            $session->id_user = Auth::id();
            $session->start_time = now();
            $session->save();
    
            // Mengarahkan pengguna berdasarkan peran (role)
            if ($user->getRole() === 'admin') {
                return redirect('/');
            } else {
                return redirect('/');
            }
        } else {
            // Login gagal
            return redirect()->back()->withErrors(['message' => 'Username atau password salah']);
        }
    }
    

    // Fungsi untuk menampilkan halaman pendaftaran
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Fungsi untuk melakukan proses pendaftaran
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
        ]);
    
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->role = 'user'; // Setiap user yang melakukan register akan memiliki role 'user'
        $user->save();
    
        return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
    }
public function logout(Request $request)
{
    $user = Auth::user();

    // Ambil sesi terakhir pengguna
    $session = Session::where('id_user', $user->id)->latest()->first();

    if ($session) {
        // Perbarui waktu akhir sesi
        $session->end_time = now()->toDateTimeString();
        $session->save();
    }

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}

    // Fungsi untuk menghapus data user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    // Fungsi untuk menampilkan halaman edit user
    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    // Fungsi untuk memperbarui data user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
