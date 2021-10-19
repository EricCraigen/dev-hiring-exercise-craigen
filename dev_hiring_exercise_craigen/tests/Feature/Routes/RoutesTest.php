<?php

namespace Tests\Feature\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /** @test  */
    function user_can_visit_welcome_page()
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test  */
    function user_can_visit_patients_page()
    {
        $this->get('/patients')->assertStatus(200);
    }

    /** @test  */
    function user_can_visit_record_blood_pressure_page()
    {
        $this->get('/record-blood-pressure')->assertStatus(200);
    }

}
