<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\Patient;

class RecordBloodPressureModal extends Modal
{
    public $current_patient;
    public $patient_blood_pressure;

    // protected $listeners = ['set_current_patient_for_blood_pressure_input'];

    public function mount()
    {
        $this->clear_new_patient_blood_pressure();
    }

    public function clear_new_patient_blood_pressure()
    {
        $this->patient_blood_pressure = [
            'patient_id' => null,
            'bp_systolic' => null,
            'bp_diastolic' => null,
        ];
    }

    // public function set_current_patient_for_blood_pressure_input($id)
    // {
    //     $this->current_patient = Patient::find($id);
    //     // ddd($this->current_patient);
    // }

    public function render()
    {
        return view('livewire.record-blood-pressure-modal');
    }
}
