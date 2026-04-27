@extends('layouts.app')

@section('content')
    <div class="pt-32 pb-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <!-- Header section -->
            <div class="mb-8 px-4 sm:px-0 text-center sm:text-left">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Pengaturan Profil</h2>
                <p class="mt-2 text-sm text-slate-500">Sesuaikan informasi akun dan preferensi keamanan Anda.</p>
            </div>

            <!-- Profile Info Form -->
            <div class="p-6 sm:p-10 bg-white shadow-2xl shadow-slate-200/40 sm:rounded-3xl border border-slate-100">
                <div class="max-w-xl">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Informasi Profil
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Form -->
            <div class="p-6 sm:p-10 bg-white shadow-2xl shadow-slate-200/40 sm:rounded-3xl border border-slate-100">
                <div class="max-w-xl">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-3 border-b border-slate-100 pb-4">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                        Keamanan & Kata Sandi
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Form -->
            <div class="p-6 sm:p-10 bg-gradient-to-br from-red-50 to-white shadow-2xl shadow-red-100/50 sm:rounded-3xl border border-red-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                    <svg class="w-32 h-32 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="max-w-xl relative z-10">
                    <h3 class="text-xl font-bold text-red-600 mb-6 flex items-center gap-3 border-b border-red-100 pb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        Zona Berbahaya
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
