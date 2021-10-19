<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\BloodPressure;
use App\Models\Patient;

class RecordBloodPressureModal extends Modal
{
    public $current_patient;
    public $patient_blood_pressure;

    protected $listeners = [
        'set_current_patient_for_blood_pressure_input',
        'show_modal' => 'show',
        'hide_modal' => 'hide'
    ];

    public function mount()
    {
        $this->clear_new_patient_blood_pressure();
    }

    public function record_patient_blood_pressure()
    {
        $this->current_patient = Patient::find($this->patient_blood_pressure['patient_id']);
        BloodPressure::create($this->patient_blood_pressure);
        sleep(1);
        $this->emitSelf('hide_modal');
        $this->emitTo('record-blood-pressure', 'update_most_recent_bp');
    }

    public function clear_new_patient_blood_pressure()
    {
        $this->patient_blood_pressure = [
            'patient_id' => null,
            'bp_systolic' => null,
            'bp_diastolic' => null,
        ];
    }

    public function set_current_patient_for_blood_pressure_input($id)
    {
        $this->patient_blood_pressure['patient_id'] = $id;
    }

    public function render()
    {
        return view('livewire.record-blood-pressure-modal');
    }
}
