<html>
  <head>
    <title>Gofood Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  </head>
  
  <body class="bg-pink-100 h-screen flex items-center justify-center">
    
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md mx-auto mt-20">
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
          <img
            alt="Selera Panca Logo"
            class="h-20 rounded-xl"
            src="{{ asset('storage/image/LogoRM.png') }}"
          />
          <span class="ml-2 text-xl font-semibold"> Rumah Makan Selera Panca </span>
        </div>
        <i class="fas fa-question-circle text-green-500"> </i>
      </div>

      <h2 class="text-xl font-semibold mb-2">Masukkan Email</h2>
      <p class="text-gray-600 mb-5">
        Untuk Melakukan Reset Password.
      </p>
      
      <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="relative mb-3">
                <input 
                type="email" 
                id="email" 
                name="email" 
                class="peer p-4 block w-full bg-gray-100 border border-gray-300 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  dark:border-neutral-700 dark:text-neutral-800 dark:focus:ring-neutral-600
                focus:pt-6
                focus:pb-2
                [&:not(:placeholder-shown)]:pt-6
                [&:not(:placeholder-shown)]:pb-2
                autofill:pt-6
                autofill:pb-2" placeholder="you@email.com"
                value="{{ old('email') }}" 
                required autofocus>
                <label 
                for="email" 
                :value="__('Email')"
                class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] dark:text-black peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:scale-90
                peer-focus:translate-x-0.5
                peer-focus:-translate-y-1.5
                peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
                peer-[:not(:placeholder-shown)]:scale-90
                peer-[:not(:placeholder-shown)]:translate-x-0.5
                peer-[:not(:placeholder-shown)]:-translate-y-1.5
                peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-800 dark:text-neutral-500">Email</label>
            </div>

            @if (session('status'))
                <div class="text-green-500 text-sm mt-4">
                    {{ session('status') }} <!-- Pesan sukses dari Laravel -->
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="text-red-500 text-sm mt-4">
                    Email tidak ditemukan atau format email salah.
                </div>
            @endif

            <button type="submit" class="mt-6 py-3 w-full inline-flex items-center justify-center text-sm font-medium rounded-lg bg-green-500 text-gray-500 mb-5">
                Kirim Link Reset
            </button>
        </form>

    </div>

    
  </body>
</html>
