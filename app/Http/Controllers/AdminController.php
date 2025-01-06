<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

// use Illuminate\Support\Facades\Session;

// class AdminController extends Controller
// {
//     public function showLoginFormAdmin()
//     {
//         return view('admin.login');
//     }

//     public function showRegistrationFormAdmin()
//     {
//         return view('admin.signup');
//     }

//     public function AdminDashboard()
//     {
//         return view('admin.dashboard');
//     }
// }


class AdminController extends Controller
{
    public function showLoginFormAdmin()
    {
        return view('admin.login');
    }

    // Fungsi Login dengan Validasi
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        // Cek autentikasi
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Jika berhasil, redirect ke dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembali ke halaman login dengan error
        return redirect()->route('loginAdmin')
            ->withErrors(['email' => 'Email atau password salah.'])
            ->withInput($request->only('email'));
    }

    public function showRegistrationFormAdmin()
    {
        return view('admin.register');
    }

    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function ManajemenMenu()
    {
        $foods = Menu::where('status', 'available')
            ->where('category', 'food')
            ->get();
        $drinks = Menu::where('status', 'available')
            ->where('category', 'drink')
            ->get();

        return view('admin.menu', [
            'foods' => $foods,
            'drinks' => $drinks,
        ]);
    }

    public function logout()
    {
        return redirect()->route('loginAdmin');
    }
}
