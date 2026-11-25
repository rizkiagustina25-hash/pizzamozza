<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'string',
                'email:filter',
                'regex:/^[^@\s]+@[^@\s.]+(?:\.[^@\s.]+)+$/',
                'max:255',
            ],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.regex' => 'Email harus menggunakan domain lengkap, contoh nama@gmail.com.',
            'email.max' => 'Email maksimal 255 karakter.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'karyawan') {
                return redirect()->route('karyawan.dashboard');
            }

            return redirect()->route('products.index');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput();
    }

    // Menampilkan halaman registrasi
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email:filter',
                'regex:/^[^@\s]+@[^@\s.]+(?:\.[^@\s.]+)+$/',
                'max:255',
                'unique:users,email',
            ],
            'no_hp' => [
                'required',
                'string',
                'max:20',
                'unique:users,no_hp',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'address' => [
                'required',
                'string',
                'max:1000',
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.regex' => 'Email harus menggunakan domain lengkap, contoh nama@gmail.com.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah terdaftar. Gunakan email lain.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'address.required' => 'Alamat wajib diisi.',
        ]);

        // Membuat akun pelanggan baru
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'role' => 'pelanggan',
            'status' => 'active',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    // Menampilkan halaman reset password
    public function showResetPassword()
    {
        return view('auth.reset-password');
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.current_password' => 'Password lama tidak sesuai.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password.min' => 'Password baru minimal 8 karakter.',
        ]);

        // Mengambil data pengguna yang sedang login
        $user = User::findOrFail(Auth::id());

        // Memperbarui password
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()
            ->route('dashboard', ['menu' => 'profile'])
            ->with('success', 'Password berhasil diubah.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}