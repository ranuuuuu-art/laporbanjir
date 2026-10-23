<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        // Faker dengan locale Indonesia
        $faker = Faker::create('id_ID');

        // Buat 5 akun petugas dummy
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Akun admin BPBD dengan email dan password tetap
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@bpbd.com'],
            [
                'name' => 'Admin BPBD',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}