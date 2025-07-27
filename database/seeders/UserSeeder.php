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
            'firstname'           => 'Kabiru',
            'middlename'          => 'M.',
            'lastname'            => 'Sanni',
            'service_number'      => 'NA00123',
            'email'               => 'admin@test.com',
            'phone'               => '07068310803',
            'unit'                => '1 Division',
            'rank'                => 'Major',
            'role'                => 'admin',
            'status'              => 'Active',
            'email_verified_at'   => now(),
            'password'            => Hash::make('password123'),
            'profile_photo_path'  => null,
            'current_team_id'     => null,
        ]);

        User::create([
            'firstname'           => 'Grace',
            'middlename'          => 'O.',
            'lastname'            => 'Bello',
            'service_number'      => 'NA00456',
            'email'               => 'personnel@army.ng',
            'phone'               => '08087654321',
            'unit'                => 'Finance',
            'rank'                => 'Captain',
            'role'                => 'personnel',
            'status'              => 'Active',
            'email_verified_at'   => now(),
            'password'            => Hash::make('password123'),
            'profile_photo_path'  => null,
            'current_team_id'     => null,
        ]);
    }
}
