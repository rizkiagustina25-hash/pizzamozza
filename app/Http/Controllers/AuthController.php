<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
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

public function showRegister()
{
    return view('auth.register');
}

    public function register(Request $request)
    {
        $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'no_hp' => ['required', 'string', 'max:20', 'unique:users,no_hp'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'address' => ['required', 'string', 'max:1000'],
        ]);

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

public function showResetPassword()
{
    return view('auth.reset-password');
}

public function resetPassword(Request $request)
{
    $data = $request->validate([
        'current_password' => ['required', 'current_password'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'current_password.current_password' => 'Password lama tidak sesuai.',
        'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        'password.min' => 'Password baru minimal 8 karakter.',
    ]);

    $user = Auth::user();

    $user->update([
        'password' => Hash::make($data['password']),
    ]);

    return redirect()
        ->route('dashboard', ['menu' => 'profile'])
        ->with('success', 'Password berhasil diubah.');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}