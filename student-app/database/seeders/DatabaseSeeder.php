<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Sample students
        Student::updateOrCreate(['nis' => '1001'], [
            'no_urut' => 1,
            'nama' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2008-01-10',
            'kelas' => '9A',
            'alamat' => 'Jl. Kenanga No. 1',
        ]);
        Student::updateOrCreate(['nis' => '1002'], [
            'no_urut' => 2,
            'nama' => 'Siti Aminah',
            'jenis_kelamin' => 'P',
            'tanggal_lahir' => '2008-05-20',
            'kelas' => '9B',
            'alamat' => 'Jl. Melati No. 2',
        ]);
    }
}
