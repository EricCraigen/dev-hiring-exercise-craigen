<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($patient_ctr = 0; $patient_ctr < 50000; $patient_ctr++) {
            $data[] = [
                'first_name' => $faker->firstName(),
                'middle_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'date_of_birth' => $faker->date(),
                'gender' => $faker->randomElement($array = array ('Male','Female')),
                'status' => $faker->boolean(),
                'marital_status' => $faker->randomElement($array = array ('Married','Divorced','Widowed','Single')),
                'race' => $faker->randomElement($array = array ('White','African American','Hispanic/Latino','Native American')),
                'language' => $faker->randomElement($array = array ('English','Spanish','Porteguese','German')),
                'employment_status' => $faker->randomElement($array = array ('Full Time','Part Time','Student','Un-Employeed')),
                'contact_by' => $faker->randomElement($array = array ('Primary Phone','Secondary Phone','Email')),
                'soc_sec_no' => 'XXX-XX-XXXX',
                'referred_by' => $faker->randomElement($array = array ('In house','Specialist','Other')),
                'email' => $faker->unique()->safeEmail(),
                'street_address_1' => $faker->streetAddress(),
                'street_address_2' => $faker->secondaryAddress(),
                'city' => $faker->city(),
                'state' => $faker->stateAbbr(),
                'postal_code' => $faker->postcode(),
                'primary_phone' => $faker->phoneNumber(),
                'secondary_phone' => $faker->phoneNumber(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        // foreach ($data as $patient) {
        //     Patient::insert($patient);
        // }

        $chunks = array_chunk($data, 5000, true);

        foreach ($chunks as $chunk) {
            foreach ($chunk as $patient) {
                Patient::insert($patient);
            }
        }
    }
}
