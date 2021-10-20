<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\CreatePatientModal;
use App\Http\Livewire\Modal;
use App\Http\Livewire\RecordBloodPressureModal;
use App\Http\Livewire\RecordPatientBloodPressure;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmitEventsTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    function modal_show_can_be_toggled()
    {
        // Livewire::test(CreatePatientModal::class)
        //     ->toggle('show')
        //     ->assertSet('show', true);

        // Livewire::test(RecordBloodPressureModal::class)
        //     ->toggle('show')
        //     ->assertSet('show', true);

        Livewire::test(Modal::class)
            ->emit('show_modal')
            ->assertEmitted('show_modal');
    }
}
