<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile - PizzaMozza</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #faf7f2;
            color: #222;
        }

        .header {
            height: 76px;
            background: white;
            border-bottom: 1px solid #eeeeee;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 70px;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #c62828;
        }

        .logo span {
            color: #222;
        }

        .header-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-link {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .header-link:hover {
            color: #c62828;
        }

        .logout-button {
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 25px;
        }

        .profile-card {
            background: white;
            border: 1px solid #eeeeee;
            border-radius: 16px;
            padding: 35px;
        }

        .title {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .success-message {
            background: #e9f5df;
            color: #56802f;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error-message {
            background: #ffe5e5;
            color: #b71c1c;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            border: 1px solid #dddddd;
            border-radius: 7px;
            padding: 11px 13px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: #c62828;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .current-photo {
            margin-bottom: 20px;
        }

        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #c62828;
            display: block;
            margin-bottom: 12px;
        }

        .photo-placeholder {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #f5c0b3;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 45px;
            margin-bottom: 12px;
        }

        .file-input {
            font-size: 13px;
        }

        .photo-info {
            color: #888;
            font-size: 11px;
            margin-top: 7px;
        }

        .button-area {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 30px;
        }

        .save-button {
            background: #c62828;
            color: white;
            border: none;

            padding: 11px 20px;
            border-radius: 7px;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;
        }

        .save-button:hover {
            background: #a91f1f;
        }

        .cancel-button {
            color: #555;
            text-decoration: none;
            font-size: 13px;
        }

        .cancel-button:hover {
            color: #c62828;
        }

        @media (max-width: 650px) {

            .header {
                padding: 0 20px;
            }

            .header-links {
                gap: 10px;
            }

            .profile-card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <header class="header">

        <div class="logo">
            🍕 <span>PizzaMozza</span>
        </div>

        <div class="header-links">

            <a
                href="{{ route('dashboard') }}"
                class="header-link"
            >
                🏠 Home
            </a>

            <a
                href="{{ route('dashboard') }}?menu=profile"
                class="header-link"
            >
                👤 Profile
            </a>

            <form
                method="POST"
                action="{{ route('logout') }}"
                style="display: inline;"
            >
                @csrf

                <button
                    type="submit"
                    class="header-link logout-button"
                >
                    Logout
                </button>
            </form>

        </div>

    </header>


    <main class="container">

        <div class="profile-card">

            <h1 class="title">
                Edit Profile
            </h1>

            <p class="subtitle">
                Perbarui informasi akun PizzaMozza kamu.
            </p>


            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="error-message">

                    <strong>Periksa kembali data berikut:</strong>

                    <ul style="margin-top: 8px; padding-left: 18px;">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FORM --}}
            <form
                method="POST"
                action="{{ route('profile.update') }}"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- FOTO PROFILE --}}
                <div class="form-group">

                    <label class="form-label">
                        Foto Profile
                    </label>

                    <div class="current-photo">

                        @if($user->foto_profile)

                            <img
                                src="{{ asset('profile/' . $user->foto_profile) }}"
                                alt="Foto Profile"
                                class="profile-photo"
                            >

                        @else

                            <div class="photo-placeholder">
                                👤
                            </div>

                        @endif

                        <input
                            type="file"
                            name="foto_profile"
                            class="file-input"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="photo-info">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </div>

                    </div>

                </div>


                {{-- NAMA --}}
                <div class="form-group">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input"
                        value="{{ old('name', $user->name) }}"
                        required
                    >

                </div>


                {{-- EMAIL --}}
                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email', $user->email) }}"
                        required
                    >

                </div>


                {{-- NO HP --}}
                <div class="form-group">

                    <label
                        for="no_hp"
                        class="form-label"
                    >
                        No. HP
                    </label>

                    <input
                        type="text"
                        id="no_hp"
                        name="no_hp"
                        class="form-input"
                        value="{{ old('no_hp', $user->no_hp) }}"
                        placeholder="Contoh: 081234567890"
                    >

                </div>


                {{-- ALAMAT --}}
                <div class="form-group">

                    <label
                        for="address"
                        class="form-label"
                    >
                        Alamat
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        class="form-textarea"
                        placeholder="Masukkan alamat lengkap..."
                    >{{ old('address', $user->address) }}</textarea>

                </div>


                {{-- BUTTON --}}
                <div class="button-area">

                    <button
                        type="submit"
                        class="save-button"
                    >
                        💾 Simpan Perubahan
                    </button>

                    <a
                        href="{{ route('dashboard') }}?menu=profile"
                        class="cancel-button"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>

</html>