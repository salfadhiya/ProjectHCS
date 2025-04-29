<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Pastikan import Hash untuk enkripsi password

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin General
        User::factory()->create([
            'name' => 'Admin General',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), // password harus di-hash
            'role' => 'Admin General',
        ]);

        // Admin IN
        User::factory()->create([
            'name' => 'Admin IN',
            'email' => 'adminin@admin.com',
            'password' => Hash::make('adminin'), // password sesuai role
            'role' => 'Admin IN',
        ]);

        // Admin Maintenance
        User::factory()->create([
            'name' => 'Admin Maintenance',
            'email' => 'adminmaintenance@admin.com',
            'password' => Hash::make('adminmaintenance'),
            'role' => 'Admin Maintenance',
        ]);

        // Admin OUT
        User::factory()->create([
            'name' => 'Admin OUT',
            'email' => 'adminout@admin.com',
            'password' => Hash::make('adminout'),
            'role' => 'Admin OUT',
        ]);
    }
}

