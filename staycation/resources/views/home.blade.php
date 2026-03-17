@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-white">
        <!-- Decoration -->
        <div class="absolute inset-y-0 right-0 w-1/2 bg-blue-50 rounded-l-[100px] -z-10 transform translate-x-1/3"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-600 text-sm font-semibold mb-6">#1 Pilihan Liburan Anda</span>
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:leading-tight">
                        Lupakan Rutinitas,<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Mulai Staycation.</span>
                    </h1>
                    <p class="mt-6 text-base text-gray-500 sm:mt-8 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-8 md:text-xl lg:mx-0">
                        Kami menyediakan berbagai pilihan tempat penginapan terbaik yang nyaman, estetik, dan strategis. Nikmati pengalaman menginap tak terlupakan bersama orang tersayang.
                    </p>
                    <div class="mt-10 sm:flex sm:justify-center lg:justify-start gap-4">
                        <a href="#rooms" class="w-full flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 md:text-lg transition shadow-lg shadow-blue-300 md:w-auto">
                            Eksplor Kamar
                        </a>
                        <a href="#about" class="w-full flex items-center justify-center px-8 py-3.5 border-2 border-gray-200 text-base font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 md:text-lg transition md:w-auto mt-4 sm:mt-0">
                            Cara Pesan
                        </a>
                    </div>
                </div>
                <div class="mt-16 lg:mt-0 lg:col-span-6 relative">
                    <img class="w-full rounded-[2rem] shadow-2xl transform lg:scale-105" src="img/hotel.jpg" alt="Beautiful Hotel Room">
                    
                    <!-- Floating Card Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl flex items-center gap-4 border border-gray-50 hidden md:flex">
                        <div class="bg-green-100 p-3 rounded-full text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Rating Pelanggan</p>
                            <p class="text-lg font-bold text-gray-900">4.9 / 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Rooms Section -->
    <div id="rooms" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Rekomendasi</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl text-balance">
                    Kamar Pilihan Terbaik Untuk Anda
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Kamar dengan fasilitas lengkap siap menemani masa istirahat Anda dengan nyaman.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($rooms ?? [] as $room)
                <!-- Room Card -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-300 border border-gray-100 group flex flex-col">
                    <div class="aspect-w-16 aspect-h-10 relative overflow-hidden">
                        <!-- We use a placeholder since actual image paths might differ -->
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="{{ $room->name }}" class="w-full h-64 object-cover object-center group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-sm font-semibold text-pink-600 shadow-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            Populer
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $room->name }}</h3>
                        </div>
                        <p class="text-gray-500 mb-6 text-sm line-clamp-3">
                            {{ $room->description }}
                        </p>
                        
                        <!-- Facilities preview (mock) -->
                        <div class="flex gap-4 text-gray-400 text-sm mb-6 pb-6 border-b border-gray-100">
                            <div class="flex items-center gap-1.5"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg> 2 Kasur</div>
                            <div class="flex items-center gap-1.5"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> TV & WiFi</div>
                        </div>

                        <div class="mt-auto flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Mulai dari</p>
                                <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($room->price, 0, ',', '.') }}<span class="text-sm font-normal text-gray-500">/malam</span></p>
                            </div>
                            <a href="{{ route('rooms.show', $room->id) }}" class="p-3 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition group-hover:scale-110">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-block p-4 rounded-full bg-yellow-50 text-yellow-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Belum ada kamar tersedia</h3>
                    <p class="mt-2 text-gray-500">Administrator sedang menyiapkan daftar kamar terbaik untuk Anda.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-2 px-6 py-3 border border-gray-300 text-base font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 transition">
                    Lihat Semua Kamar
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center blend-overlay opacity-20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10 text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl text-balance">
                Siap untuk liburan Anda berikutnya?
            </h2>
            <p class="mt-4 text-xl leading-6 text-blue-100 max-w-2xl mx-auto text-balance">
                Daftar sekarang dan nikmati kemudahan memesan kamar terbaik untuk staycation impianmu.
            </p>
            <div class="mt-10 flex justify-center gap-4">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-xl shadow-lg hover:bg-gray-50 transition transform hover:-translate-y-1">Buat Akun Sekarang</a>
                @else
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-xl shadow-lg hover:bg-gray-50 transition transform hover:-translate-y-1">Mulai Pesan Kamar</a>
                @endif
            </div>
        </div>
    </div>
@endsection
