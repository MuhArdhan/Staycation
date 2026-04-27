<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
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

        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-gray-900' : 'text-gray-500' }} font-medium hover:text-blue-600 transition">Beranda</a>
                        <a href="{{ url('/#rooms') }}" class="text-gray-500 font-medium hover:text-blue-600 transition">Kamar</a>
                        <a href="{{ url('/#about') }}" class="text-gray-500 font-medium hover:text-blue-600 transition">Tentang Kami</a>
                        <a href="{{ url('/#contact') }}" class="text-gray-500 font-medium hover:text-blue-600 transition">Kontak</a>
                    </div>

                    <!-- Auth / Actions -->
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4">
                                @auth
                                    <div class="relative">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center gap-2 p-1 pl-3 bg-white border border-gray-200 rounded-full hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                                    @if(Auth::user()->avatar)
                                                        <img src="{{ str_starts_with(Auth::user()->avatar, 'http') ? Auth::user()->avatar : asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover border border-gray-100">
                                                    @else
                                                        <div class="h-8 w-8 rounded-full bg-slate-800 flex items-center justify-center text-white text-xs font-bold">
                                                            {{ substr(Auth::user()->name, 0, 1) }}
                                                        </div>
                                                    @endif
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                    {{ __('Profile') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('bookings.index')" class="flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    {{ __('History') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <x-dropdown-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();" class="flex items-center gap-2 text-red-600 hover:text-red-700 hover:bg-red-50">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-blue-600 transition">Masuk</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm shadow-blue-200 transition">Daftar</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer id="contact" class="bg-gray-900 pt-16 pb-8">
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
                            <li><a href="{{ url('/') }}" class="hover:text-blue-500 transition">Beranda</a></li>
                            <li><a href="{{ url('/#rooms') }}" class="hover:text-blue-500 transition">Kamar</a></li>
                            <li><a href="{{ url('/#about') }}" class="hover:text-blue-500 transition">Tentang Kami</a></li>
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

        <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
                offset: 50,
                duration: 800,
            });
        </script>
    </body>
</html>
