<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_lengkap' => 'Admin',
            'username' =>'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin12345'),
            'no_hp' => '0822222',
            'role' => 'admin'
        ]);
    }
}
