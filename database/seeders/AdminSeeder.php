<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $adminEmail = 'super@admin.com';
        $adminPassword = '12345678'; // Catatan: Gunakan password yang lebih kuat untuk produksi

        $adminData = [
            'name' => 'Super Admin',
            'email' => $adminEmail,
            'password' => Hash::make($adminPassword),
        ];

        // Periksa apakah kolom 'is_admin' ada
        if (Schema::hasColumn('users', 'is_admin')) {
            $adminData['is_admin'] = true;
        }

        $admin = User::updateOrCreate(
            ['email' => $adminEmail],
            $adminData
        );

        if ($admin->wasRecentlyCreated) {
            $this->command->info('Admin user created successfully.');
            $this->command->warn('Remember to change the default password in production!');
        } else {
            $this->command->info('Admin user already exists. Data updated.');
        }

        $this->command->info('Admin Email: ' . $adminEmail);
        $this->command->info('Admin Password: ' . $adminPassword);
    }
}
