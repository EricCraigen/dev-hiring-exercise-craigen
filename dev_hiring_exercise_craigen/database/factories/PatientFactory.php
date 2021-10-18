<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement($array = array ('Male','Female')),
            'status' => $this->faker->boolean(),
            'marital_status' => $this->faker->randomElement($array = array ('Married','Divorced','Widowed','Single')),
            'race' => $this->faker->randomElement($array = array ('White','African American','Hispanic/Latino','Native American')),
            'language' => $this->faker->randomElement($array = array ('English','Spanish','Porteguese','German')),
            'employment_status' => $this->faker->randomElement($array = array ('Full Time','Part Time','Student','Un-Employeed')),
            'contact_by' => $this->faker->randomElement($array = array ('Primary Phone','Secondary Phone','Email')),
            'soc_sec_no' => 'XXX-XX-XXXX',
            'referred_by' => $this->faker->randomElement($array = array ('In house','Specialist','Other')),
            'email' => $this->faker->unique()->safeEmail(),
            'street_address_1' => $this->faker->streetAddress(),
            'street_address_2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'postal_code' => $this->faker->postcode(),
            'primary_phone' => $this->faker->phoneNumber(),
            'secondary_phone' => $this->faker->phoneNumber(),
        ];
    }
}
