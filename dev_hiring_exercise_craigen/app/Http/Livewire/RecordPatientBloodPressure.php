<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecordPatientBloodPressure extends Component
{
    public function render()
    {
        return view('livewire.record-patient-blood-pressure')->layout('layouts.app');
    }
}
