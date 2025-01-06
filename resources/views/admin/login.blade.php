<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In | Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center items-center h-screen bg-gray-200 px-6">
        <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
            <div class="flex justify-center items-center">
                <img alt="RM. Selera Panca" class="mr-4 rounded-xl size-16" src="{{ asset('images/Logo RM. Selera Panca.png') }}" />
                <span class="text-gray-700 font-semibold text-2xl"> Admin Login </span>
            </div>

            <!-- Pesan Error Validasi -->
            @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 mt-4 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Pesan Error Autentikasi -->
            @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 mt-4 rounded-md">
                {{ session('error') }}
            </div>
            @endif

            <!-- Form Login -->
            <form class="mt-4" action="{{ route('loginAdmin') }}" method="POST">
                @csrf
                <label class="block">
                    <span class="text-gray-700 text-sm">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600" required>
                </label>

                <label class="block mt-3">
                    <span class="text-gray-700 text-sm">Password</span>
                    <input type="password" name="password" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600" required>
                </label>

                <div class="flex justify-between items-center mt-4">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remember" class="form-checkbox text-indigo-600">
                            <span class="mx-2 text-gray-600 text-sm">Ingat Saya</span>
                        </label>
                    </div>

                    <div>
                        <a class="block text-sm font-medium text-indigo-700 hover:underline" href="#">Lupa Password?</a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>