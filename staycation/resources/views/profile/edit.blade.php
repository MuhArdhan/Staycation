@extends('layouts.app')

@section('content')
    <div class="pt-28 pb-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Header section -->
            <div class="mb-8 px-4 sm:px-0">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Profil Anda</h2>
                <p class="mt-2 text-sm text-gray-500">Kelola informasi akun, kata sandi, dan data pribadi Anda di sini.</p>
            </div>

            <!-- Profile Info Form -->
            <div class="p-6 sm:p-10 bg-white shadow-xl shadow-gray-200/40 sm:rounded-2xl border border-gray-100">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Informasi Profil</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Form -->
            <div class="p-6 sm:p-10 bg-white shadow-xl shadow-gray-200/40 sm:rounded-2xl border border-gray-100">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Ubah Kata Sandi</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Form -->
            <div class="p-6 sm:p-10 bg-red-50/50 shadow-sm sm:rounded-2xl border border-red-100">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-red-600 mb-6 border-b border-red-100 pb-4">Hapus Akun</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
