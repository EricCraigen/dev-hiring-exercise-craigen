<?php

namespace Tests\Feature\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IsComponentTest extends TestCase
{
    /** @test  */
    function welcome_page_is_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('welcome');
    }

    /** @test  */
    function record_blood_pressure_modal_is_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('record-blood-pressure-modal');
    }

    /** @test  */
    function create_patient_modal_is_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('create-patient-modal');
    }

    /** @test  */
    function patients_page_is_livewire_component()
    {
        $this->get('/patients')->assertSeeLivewire('patients');
    }

    /** @test  */
    function record_blood_pressure_page_is_livewire_component()
    {
        $this->get('/record-blood-pressure')->assertSeeLivewire('record-patient-blood-pressure');
    }
}
