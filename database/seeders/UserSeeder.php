<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Kabiru Sani',
            'email'     => 'staff@test.com',
            'role'      => 'staff',
            'password'  =>  Hash::make('123456')
        ]);

        User::create([
            'name'      => 'Ishaq Kamaldeen',
            'email'     => 'admin@test.com',
            'role'      => 'admin',
            'password'  =>  Hash::make('123456')
        ]);
    }
}
