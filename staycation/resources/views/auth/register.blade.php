<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Akun - {{ config('app.name', 'Staycation') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-white">
    <div class="min-h-screen flex">
        <!-- Left Side: Image -->
        <div class="hidden lg:block lg:w-1/2 relative">
            <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80" alt="Staycation Register" class="absolute inset-0 w-full h-full object-cover">
            <!-- Overlay and Text -->
            <div class="absolute inset-0 bg-blue-900/40 blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-12 text-white">
                <a href="/" class="flex items-center gap-2 mb-8 inline-block">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 12h3v8h14v-8h3L12 2zm0 2.83l5 5V18H7v-8.17l5-5zM12 9a3 3 0 100 6 3 3 0 000-6z"/>
                    </svg>
                    <span class="text-3xl font-bold tracking-tight">Staycation.</span>
                </a>
                <h2 class="text-4xl font-extrabold mb-4 text-balance">Mulai Perjalanan Barumu Bersama Kami.</h2>
                <p class="text-lg text-gray-300 max-w-md">Daftar sekarang dan nikmati ratusan pilihan kamar estetik dan penawaran tak terbatas untuk liburan Anda berikutnya.</p>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 relative overflow-y-auto">
            <a href="/" class="absolute top-8 right-8 text-gray-500 hover:text-blue-600 transition hidden sm:flex items-center gap-2 text-sm font-medium bg-gray-50 px-4 py-2 rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Beranda
            </a>

            <div class="w-full max-w-md">
                <div class="text-center lg:text-left mb-10">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Buat Akun Baru</h1>
                    <p class="text-gray-500">Bergabunglah dan mulai pesan kamar impianmu.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="block w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out placeholder-gray-400" placeholder="John Doe" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="block w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out placeholder-gray-400" placeholder="nama@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out placeholder-gray-400" placeholder="Minimal 8 karakter" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out placeholder-gray-400" placeholder="Ulangi password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition shadow-blue-200 mt-2">
                        Daftar Akun Sekarang
                    </button>
                </form>

                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-3 bg-white text-gray-500">Atau daftar dengan</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 24 24">
                                <path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335"></path>
                                <path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4"></path>
                                <path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05"></path>
                                <path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.26538 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853"></path>
                            </svg>
                            <span class="font-bold">Daftar dengan Google</span>
                        </a>
                    </div>
                </div>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-500 transition">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
