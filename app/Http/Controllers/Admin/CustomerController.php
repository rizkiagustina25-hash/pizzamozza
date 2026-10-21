<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'pelanggan');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $customers = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'no_hp' => [
                'required',
                'string',
                'max:20',
                'unique:users,no_hp'
            ],
            'address' => [
                'required',
                'string',
                'max:1000'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
            'status' => [
                'required',
                'in:active,inactive'
            ],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role' => 'pelanggan',
            'status' => $data['status'],
        ]);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function show(User $customer)
    {
        abort_unless($customer->role === 'pelanggan', 404);

        return view(
            'admin.customers.show',
            compact('customer')
        );
    }

    public function edit(User $customer)
    {
        abort_unless($customer->role === 'pelanggan', 404);

        return view(
            'admin.customers.edit',
            compact('customer')
        );
    }

    public function update(Request $request, User $customer)
    {
        abort_unless($customer->role === 'pelanggan', 404);

        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $customer->id,
            ],

            'no_hp' => [
                'required',
                'string',
                'max:20',
                'unique:users,no_hp,' . $customer->id,
            ],

            'address' => [
                'required',
                'string',
                'max:1000'
            ],

            'status' => [
                'required',
                'in:active,inactive'
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed'
            ],
        ]);

        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->no_hp = $data['no_hp'];
        $customer->address = $data['address'];
        $customer->status = $data['status'];

        if (!empty($data['password'])) {
            $customer->password = Hash::make(
                $data['password']
            );
        }

        $customer->save();

        return redirect()
            ->route('admin.customers.index')
            ->with(
                'success',
                'Data pelanggan berhasil diperbarui.'
            );
    }

    public function destroy(User $customer)
    {
        abort_unless($customer->role === 'pelanggan', 404);

        $customer->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with(
                'success',
                'Pelanggan berhasil dihapus.'
            );
    }
}