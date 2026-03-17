<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

         <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 transition-all border-b border-gray-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center gap-2">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 12h3v8h14v-8h3L12 2zm0 2.83l5 5V18H7v-8.17l5-5zM12 9a3 3 0 100 6 3 3 0 000-6z"/>
                        </svg>
                        <a href="/" class="text-2xl font-bold text-blue-600 tracking-tight">Stay<span class="text-gray-900">cation.</span></a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
                        <a href="/" class="text-gray-900 font-medium hover:text-blue-600 transition">Beranda</a>
                        <a href="#rooms" class="text-gray-500 font-medium hover:text-blue-600 transition">Kamar</a>
                        <a href="#about" class="text-gray-500 font-medium hover:text-blue-600 transition">Tentang Kami</a>
                        <a href="#contact" class="text-gray-500 font-medium hover:text-blue-600 transition">Kontak</a>
                    </div>

                    <!-- Auth / Actions -->
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            <div class="hidden sm:flex sm:items-center space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="font-medium text-gray-600 hover:text-blue-600 transition">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-blue-600 transition">Masuk</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm shadow-blue-200 transition">Daftar</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        <!-- Mobile menu button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 text-gray-300">
                    <div class="md:col-span-2">
                        <span class="text-2xl font-bold text-white tracking-tight">Stay<span class="text-blue-500">cation.</span></span>
                        <p class="mt-4 text-sm max-w-sm text-gray-400">
                            Staycation adalah platform pemesanan kamar penginapan dan hotel terbaik di Indonesia, dirancang untuk memberi Anda pengalaman liburan tanpa batas.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-6">Navigasi</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="/" class="hover:text-blue-500 transition">Beranda</a></li>
                            <li><a href="#rooms" class="hover:text-blue-500 transition">Kamar</a></li>
                            <li><a href="#about" class="hover:text-blue-500 transition">Tentang Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-6">Kontak</h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> hello@staycation.id</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> +62 812 3456 7890</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-16 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} Staycation Booking App. Seluruh hak cipta dilindungi.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
