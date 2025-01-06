<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Register</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
    <!-- Logo dan Judul -->
    <div class="flex items-center justify-center mb-6">
      <img alt="Selera Panca Logo" class="h-16 rounded-xl" src="{{ asset('images/Logo RM. Selera Panca.png') }}">
      <h2 class="ml-2 text-xl font-bold">Admin Register</h2>
    </div>

    <!-- Formulir Pendaftaran -->
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <!-- Nama -->
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" id="nama" required
          class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- No Telepon -->
      <div class="mb-4">
        <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" required
          class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email_regis" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email_regis" id="email_regis" required
          class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password_regis" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password_regis" id="password_regis" required
          class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Tombol Submit -->
      <button type="submit"
        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        Daftar
      </button>
    </form>

    <!-- Tautan ke Halaman Login -->
    <p class="mt-4 text-center">
      Sudah punya akun?
      <a href="{{ route('loginAdmin') }}" class="text-indigo-600 hover:underline">Masuk di sini</a>
    </p>
  </div>
</body>

</html>