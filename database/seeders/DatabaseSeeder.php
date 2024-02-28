<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'username' => 'Juwita123',
           'email' => 'juwita123@gmail.com',
           'password' => Hash::make('12345'),
           'nama_lengkap' => 'juwitanengsih',
           'role' => 'administrator',
           'verifikasi' => 'sudah',
           'alamat' => 'subang',
       ]);
    }
}