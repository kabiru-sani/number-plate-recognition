<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Owner;
use App\Models\PlateScan;


class OwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = Owner::create([
            'name'  => 'Comdt NACWS',
            'email' => 'NACWS@NDA.COM',
            'phone' => '08012312312',
            'department' => 'NACWS Giri',
            'photo' => 'user.png',
            'gender' => 'male',
            'address' => 'Muhammadu Buhari NA cantonment, Giri',
            'state_of_origin' => '',
        ]);
            PlateScan::create([
                'user_id' => User::first()->id,
                'plate'    => 'NA58BOG',
                'score'     => '0.994',
                'image_path' => 'assets/img/plates/plate1.jpg',
                'raw_response' => null,
                'owner_id' => $owner->id,
            ]);

        $owner1 = Owner::create([
            'name'  => 'CO NNSC-NDA',
            'email' => 'NNSC@NDA.COM',
            'phone' => '08012345678',
            'department' => 'NNSC-NDA',
            'photo' => 'user.png',
            'gender' => 'male',
            'address' => 'NDA Afaka',
            'state_of_origin' => '',
        ]);
            PlateScan::create([
                'user_id' => User::first()->id,
                'plate'    => 'D88NN', 
                'score'     => '0.994',
                'image_path' => 'assets/img/plates/plate2.jpg',
                'raw_response' => null,
                'owner_id' => $owner1->id,
            ]);
            PlateScan::create([
                'user_id' => User::first()->id,
                'plate'    => 'DOS88NN', 
                'score'     => '0.994',
                'image_path' => 'assets/img/plates/plate2.jpg',
                'raw_response' => null,
                'owner_id' => $owner1->id,
            ]);
            PlateScan::create([
                'user_id' => User::first()->id,
                'plate'    => 'DS88NN', 
                'score'     => '0.994',
                'image_path' => 'assets/img/plates/plate2.jpg',
                'raw_response' => null,
                'owner_id' => $owner1->id,
            ]);

        $owner2 = Owner::create([
            'name'  => 'NA-NDA',
            'email' => 'NA@NDA.COM',
            'phone' => '08012300078',
            'department' => 'NA-NDA',
            'photo' => 'user.png',
            'gender' => 'male',
            'address' => 'Defence HQ Abuja',
            'state_of_origin' => '',
        ]);
            PlateScan::create([
                'user_id' => User::first()->id,
                'plate'    => 'NA453BE',
                'score'     => '0.994',
                'image_path' => 'assets/img/plates/plate3.jpg',
                'raw_response' => null,
                'owner_id' => $owner2->id,
            ]);
    }
}
