<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecordPatientBloodPressure extends Component
{
    public function render()
    {

        view()->share('title', 'Record Patient Blood Pressure');
        view()->share('header', 'A simple form allowing you to record a patients blood pressure');

        return view('livewire.record-patient-blood-pressure')->layout('layouts.app');
    }
}
