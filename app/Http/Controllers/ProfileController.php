<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pelanggan.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('pelanggan.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:1000',
            'foto_profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto_profile')) {

            $file = $request->file('foto_profile');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('profile'),
                $filename
            );

            $data['foto_profile'] = $filename;
        }

        $user->update($data);

       return redirect()
    ->route('dashboard', ['menu' => 'profile'])
    ->with('success', 'Profile berhasil diperbarui.');
    }
}