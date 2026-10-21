<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'karyawan');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $employees = $query->latest()->get();

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:1000'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'karyawan',
            'no_hp' => $data['no_hp'] ?? null,
            'address' => $data['address'] ?? null,
        ]);

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function show(User $employee)
    {
        abort_unless($employee->role === 'karyawan', 404);

        return view('admin.employees.show', compact('employee'));
    }

    public function edit(User $employee)
    {
        abort_unless($employee->role === 'karyawan', 404);

        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, User $employee)
    {
        abort_unless($employee->role === 'karyawan', 404);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $employee->id
            ],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:1000'],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        $employee->name = $data['name'];
        $employee->email = $data['email'];
        $employee->no_hp = $data['no_hp'] ?? null;
        $employee->address = $data['address'] ?? null;

        if (!empty($data['password'])) {
            $employee->password = Hash::make($data['password']);
        }

        $employee->save();

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(User $employee)
    {
        abort_unless($employee->role === 'karyawan', 404);

        $employee->delete();

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Karyawan berhasil dihapus.');
    }
}