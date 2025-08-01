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
            'firstname'           => 'CHIKEZIE',
            'middlename'          => 'N',
            'lastname'            => 'EJIKE',
            'service_number'      => 'NA00123',
            'email'               => 'admin@test.com',
            'phone'               => '09060032475',
            'unit'                => '1 Division',
            'rank'                => 'Major',
            'role'                => 'admin',
            'status'              => 'Active',
            'email_verified_at'   => now(),
            'password'            => Hash::make('Admin123'),
            'profile_photo_path'  => null,
            'current_team_id'     => null,
        ]);

        User::create([
            'firstname'           => 'Kabiru',
            'middlename'          => 'M',
            'lastname'            => 'Sani',
            'service_number'      => 'NA00456',
            'email'               => 'kb@test.com',
            'phone'               => '08087654321',
            'unit'                => 'Finance',
            'rank'                => 'Captain',
            'role'                => 'personnel',
            'status'              => 'Active',
            'email_verified_at'   => now(),
            'password'            => Hash::make('Staff123'),
            'profile_photo_path'  => null,
            'current_team_id'     => null,
        ]);
    }
}
