@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen pt-20 pb-20">
    <!-- Hero Image Section -->
    <div class="relative h-64 md:h-96 w-full">
        <!-- Assuming $room->image might be a full URL or a path relative to storage/public -->
        <img src="{{ str_starts_with($room->image, 'http') ? $room->image : asset($room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full p-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-200 backdrop-blur-md text-sm font-semibold mb-3 border border-blue-400/30">Detail Kamar</span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">{{ $room->name }}</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="lg:grid lg:grid-cols-12 lg:gap-12 items-start">
            
            <!-- Left Column: Details -->
            <div class="lg:col-span-8 space-y-10">
                <!-- Description -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Tentang Kamar Ini
                    </h2>
                    <p class="text-gray-600 leading-relaxed text-lg whitespace-pre-line">
                        {{ $room->description }}
                    </p>
                </div>
                
                <!-- Facilities Mock -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        Fasilitas Utama
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 text-gray-700">
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-transparent shadow-sm hover:border-blue-100 hover:bg-blue-50/50 transition">
                            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                            </div>
                            <span class="font-medium">Ukuran Luas</span>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-transparent shadow-sm hover:border-blue-100 hover:bg-blue-50/50 transition">
                            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="font-medium">Wi-Fi Cepat</span>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-transparent shadow-sm hover:border-blue-100 hover:bg-blue-50/50 transition">
                            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="font-medium">Smart TV</span>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-transparent shadow-sm hover:border-blue-100 hover:bg-blue-50/50 transition">
                            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                            </div>
                            <span class="font-medium">AC Sentral</span>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-transparent shadow-sm hover:border-blue-100 hover:bg-blue-50/50 transition">
                            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path></svg>
                            </div>
                            <span class="font-medium">Kamar Mandi Dalam</span>
                        </div>
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-transparent shadow-sm hover:border-blue-100 hover:bg-blue-50/50 transition">
                            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3.001A3 3 0 018 .001h8a3 3 0 013 3V20l-4-4-4 4-4-4-4 4V3.001z"></path></svg>
                            </div>
                            <span class="font-medium">Layanan Kamar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Booking Form -->
            <div class="lg:col-span-4 mt-12 lg:mt-0">
                <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100 sticky top-28">
                    <div class="mb-6 pb-6 border-b border-gray-100">
                        <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide uppercase">Harga mulai dari</p>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-extrabold text-blue-600 tracking-tight">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                            <span class="text-gray-500 font-medium">/ malam</span>
                        </div>
                        @if ($room->stock > 0)
                            <div class="mt-4 flex items-center gap-2 text-sm text-green-600 font-medium px-3 py-1.5 bg-green-50 rounded-lg inline-flex">
                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                Tersedia ({{ $room->stock }} kamar)
                            </div>
                        @else
                            <div class="mt-4 flex items-center gap-2 text-sm text-red-600 font-medium px-3 py-1.5 bg-red-50 rounded-lg inline-flex">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                Kamar Penuh
                            </div>
                        @endif
                    </div>

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-4 rounded-2xl flex items-start gap-3 shadow-sm">
                            <div class="bg-green-100 p-1 rounded-full text-green-600 flex-shrink-0 mt-0.5">
                                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-green-900">Berhasil!</h4>
                                <span class="font-medium text-green-700 text-sm mt-1 block">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-4 rounded-2xl text-sm flex gap-3 shadow-sm">
                            <div class="bg-red-100 p-1 rounded-full text-red-600 flex-shrink-0 mt-0.5 h-max">
                                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-red-900 mb-1">Terjadi Kesalahan</h4>
                                <ul class="list-disc list-inside space-y-1 text-red-700 font-medium">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        
                        <div class="space-y-4">
                            <div>
                                <label for="check_in" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Check-in</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="date" id="check_in" name="check_in" required min="{{ date('Y-m-d') }}" class="block w-full pl-11 rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition px-4 py-3 bg-gray-50 hover:bg-white text-gray-900 font-medium">
                                </div>
                            </div>

                            <div>
                                <label for="check_out" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Check-out</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="date" id="check_out" name="check_out" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="block w-full pl-11 rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition px-4 py-3 bg-gray-50 hover:bg-white text-gray-900 font-medium">
                                </div>
                            </div>
                        </div>

                        <button type="submit" {{ $room->stock <= 0 ? 'disabled' : '' }} class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-xl text-white {{ $room->stock > 0 ? 'bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-300' : 'bg-gray-400 cursor-not-allowed' }} transition mt-4 group">
                            {{ $room->stock > 0 ? 'Pesan Sekarang' : 'Kamar Kosong' }}
                            @if ($room->stock > 0)
                            <svg class="w-6 h-6 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            @else
                            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            @endif
                        </button>
                        
                        @guest
                            <p class="text-sm text-center text-gray-500 mt-4">
                                Anda harus <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">login</a> untuk memesan kamar.
                            </p>
                        @endguest
                    </form>
                    
                    <div class="mt-8 pt-6 border-t border-gray-100 text-center text-sm text-gray-500 flex flex-col items-center gap-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <span class="font-medium text-gray-700">Transaksi Aman & Terpercaya</span>
                        </div>
                        <p>Pembatalan gratis hingga 24 jam sebelum kedatangan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
