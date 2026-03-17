<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin Staycation',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        $rooms = [
            [
                'name' => 'Deluxe Marina Room',
                'description' => 'Kamar dengan pemandangan lautan langsung. Nikmati fasilitas seperti AC, TV Pintar, Bathub mewah, dan teras privat. Sangat cocok bagi Anda yang menginginkan ketenangan di pagi hari sela staycation.',
                'price' => 850000,
                'stock' => 5,
            ],
            [
                'name' => 'Superior City View',
                'description' => 'Tinggal di pusat kota tak pernah senyaman ini. Pemandangan lampu-lampu indahnya kota membuat malam Anda semakin berkesan. Cocok untuk pasangan.',
                'price' => 500000,
                'stock' => 10,
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Kamar termewah dengan luas yang fantastis. Terdapat ruang tamu, mini bar, dan kolam renang privat kecil di balkon. Rasakan pengalaman menginap bagai seorang VIP.',
                'price' => 2500000,
                'stock' => 2,
            ],
            [
                'name' => 'Standard Cozy Room',
                'description' => 'Kamar estetik minimalis yang super nyaman, dilengkapi dengan kasur queen size empuk. Harga sangat terjangkau dengan pelayanan standar bintang lima.',
                'price' => 350000,
                'stock' => 15,
            ]
        ];

        foreach ($rooms as $room) {
            Room::firstOrCreate(['name' => $room['name']], $room);
        }
    }
}

