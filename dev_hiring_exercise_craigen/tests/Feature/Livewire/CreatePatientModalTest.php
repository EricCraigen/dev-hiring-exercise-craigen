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
            ->set('new_patient.middle_name', 'Tester')
            ->set('new_patient.last_name', 'McTestMan')
            ->set('new_patient.date_of_birth', date('1989-12-19'))
            ->set('new_patient.gender', 'Male')
            ->set('new_patient.status', true)
            ->set('new_patient.marital_status', 'Single')
            ->set('new_patient.race', 'African American')
            ->set('new_patient.language', 'Italian')
            ->set('new_patient.employment_status', 'Full Time')
            ->set('new_patient.contact_by', 'Primary Phone')
            ->set('new_patient.soc_sec_no', 'XXX-XX-XXXX')
            ->set('new_patient.referred_by', 'Specialist')
            ->set('new_patient.email', 'testmctestman@testman.man')
            ->set('new_patient.street_address_1', '123 Test Rd')
            ->set('new_patient.street_address_2', 'Unti 123')
            ->set('new_patient.city', 'Testmanville')
            ->set('new_patient.state', 'Testington')
            ->set('new_patient.postal_code', '99207')
            ->set('new_patient.primary_phone', '5092942930')
            ->set('new_patient.secondary_phone', '5094964153')
            ->call('create_new_patient');

        $this->assertTrue(Patient::whereEmail('testmctestman@testman.man')->exists());
    }
}
