<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'first_name' => 'Michalis',
            'middle_name' => '',
            'last_name' => 'Mantoniou',
            'email' => 'mantoniou@circlelinkhealth.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'has_export' => 0,
            'export_file_tag' => null,
            'street_address_1' => '',
            'street_address_2' => '',
            'apt_number' => '',
            'city' => '',
            'state' => '',
            'postal_code' => '',
            'country' => '',
        ]);
        $user->save();
        $user = new User([
            'first_name' => 'Eric',
            'middle_name' => 'Matthew',
            'last_name' => 'Craigen',
            'email' => 'eric.craigen.cd@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'has_export' => 0,
            'export_file_tag' => null,
            'street_address_1' => '',
            'street_address_2' => '',
            'apt_number' => '',
            'city' => '',
            'state' => '',
            'postal_code' => '',
            'country' => '',
        ]);
        $user->save();
    }
}
