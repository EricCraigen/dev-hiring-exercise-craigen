<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use App\Http\Livewire\CreatePatientModal;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePatientModalTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    function can_create_patient()
    {
        Livewire::test(CreatePatientModal::class)
            ->set('new_patient.first_name', 'Test')
            ->assertHasNoErrors('new_patient.first_name')
            ->set('new_patient.middle_name', 'Tester')
            ->assertHasNoErrors('new_patient.middle_name')
            ->set('new_patient.last_name', 'McTestMan')
            ->assertHasNoErrors('new_patient.last_name')
            ->set('new_patient.date_of_birth', date('1989-12-19'))
            ->assertHasNoErrors('new_patient.date_of_birth')
            ->set('new_patient.gender', 'Male')
            ->assertHasNoErrors('new_patient.gender')
            ->set('new_patient.status', true)
            ->assertHasNoErrors('new_patient.status')
            ->set('new_patient.marital_status', 'Single')
            ->assertHasNoErrors('new_patient.marital_status')
            ->set('new_patient.race', 'African American')
            ->assertHasNoErrors('new_patient.race')
            ->set('new_patient.language', 'Italian')
            ->assertHasNoErrors('new_patient.language')
            ->set('new_patient.employment_status', 'Full Time')
            ->assertHasNoErrors('new_patient.employment_status')
            ->set('new_patient.contact_by', 'Primary Phone')
            ->assertHasNoErrors('new_patient.contact_by')
            ->set('new_patient.soc_sec_no', 'XXX-XX-XXXX')
            ->assertHasNoErrors('new_patient.soc_sec_no')
            ->set('new_patient.referred_by', 'Specialist')
            ->assertHasNoErrors('new_patient.referred_by')
            ->set('new_patient.email', 'testmctestman@testman.man')
            ->assertHasNoErrors('new_patient.email')
            ->set('new_patient.street_address_1', '123 Test Rd')
            ->assertHasNoErrors('new_patient.street_address_1')
            ->set('new_patient.street_address_2', 'Unti 123')
            ->assertHasNoErrors('new_patient.street_address_2')
            ->set('new_patient.city', 'Testmanville')
            ->assertHasNoErrors('new_patient.city')
            ->set('new_patient.state', 'Testington')
            ->assertHasNoErrors('new_patient.state')
            ->set('new_patient.postal_code', '99207')
            ->assertHasNoErrors('new_patient.postal_code')
            ->set('new_patient.primary_phone', '5092942930')
            ->assertHasNoErrors('new_patient.primary_phone')
            ->set('new_patient.secondary_phone', '5094964153')
            ->assertHasNoErrors('new_patient.secondary_phone')
            ->call('create_new_patient');

        $this->assertTrue(Patient::whereEmail('testmctestman@testman.man')->exists());
    }
}
