<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Kelola Karyawan - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-orange-50 min-h-screen">


    {{-- HEADER --}}

    <header class="bg-white border-b border-orange-100">

        <div class="max-w-7xl mx-auto px-6 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="text-orange-600 font-semibold"
                    >
                        ← Dashboard
                    </a>

                    <h1
                        class="text-3xl font-bold text-gray-800 mt-3"
                    >
                        Data Karyawan
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Kelola data karyawan PizzaMozza.
                    </p>

                </div>


                <a
                    href="{{ route('admin.employees.create') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl font-semibold transition"
                >
                    + Tambah Karyawan
                </a>

            </div>

        </div>

    </header>



    {{-- CONTENT --}}

    <main class="max-w-7xl mx-auto px-6 py-8">


        {{-- SUCCESS --}}

        @if (session('success'))

            <div
                class="mb-6 bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-xl"
            >

                {{ session('success') }}

            </div>

        @endif



        {{-- TABLE CARD --}}

        <div
            class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden"
        >

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-orange-50">

                        <tr>

                            <th
                                class="px-6 py-4 text-left text-sm font-bold text-gray-700"
                            >
                                #
                            </th>

                            <th
                                class="px-6 py-4 text-left text-sm font-bold text-gray-700"
                            >
                                Nama
                            </th>

                            <th
                                class="px-6 py-4 text-left text-sm font-bold text-gray-700"
                            >
                                Email
                            </th>

                            <th
                                class="px-6 py-4 text-left text-sm font-bold text-gray-700"
                            >
                                Role
                            </th>

                            <th
                                class="px-6 py-4 text-left text-sm font-bold text-gray-700"
                            >
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse ($employees as $employee)

                            <tr class="hover:bg-orange-50 transition">

                                <td class="px-6 py-4 text-gray-500">

                                    {{ $loop->iteration }}

                                </td>


                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center"
                                        >
                                            👤
                                        </div>

                                        <div>

                                            <p class="font-semibold text-gray-800">

                                                {{ $employee->name }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <td class="px-6 py-4 text-gray-600">

                                    {{ $employee->email }}

                                </td>


                                <td class="px-6 py-4">

                                    <span
                                        class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-semibold"
                                    >
                                        Karyawan
                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    <div class="flex gap-2">

                                        <a
                                            href="{{ route('admin.employees.edit', $employee) }}"
                                            class="px-4 py-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 font-semibold text-sm"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.employees.destroy', $employee) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 font-semibold text-sm"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-12 text-center"
                                >

                                    <div class="text-5xl mb-4">
                                        👥
                                    </div>

                                    <p class="font-bold text-gray-700">
                                        Belum ada karyawan
                                    </p>

                                    <p class="text-gray-400 text-sm mt-1">
                                        Silakan tambahkan karyawan baru.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>


</body>

</html>