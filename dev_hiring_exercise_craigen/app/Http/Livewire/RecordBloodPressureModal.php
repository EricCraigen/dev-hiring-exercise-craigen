<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Modal;
use App\Models\BloodPressure;
use App\Models\Patient;

class RecordBloodPressureModal extends Modal
{
    public $current_patient;
    public $patient_blood_pressure;
    protected $rules;

    protected $listeners = [
        'set_current_patient_for_blood_pressure_input',
        'show_modal' => 'show',
        'hide_modal' => 'hide'
    ];

    protected $messages =
    [
        'patient_blood_pressure.bp_systolic.required' => 'Systolic field is required.',
        'patient_blood_pressure.bp_systolic.numeric' => 'Systolic field must be a number greater than 0.',
        'patient_blood_pressure.bp_systolic.min' => 'Systolic cannot be below 1.',
        'patient_blood_pressure.bp_diastolic.required' => 'Diastolic field is required.',
        'patient_blood_pressure.bp_diastolic.numeric' => 'Diastolic field must be a number greater than 0.',
        'patient_blood_pressure.bp_diastolic.min' => 'Diastolic cannot be below 1.',
    ];

    protected function rules()
    {
        return [
            'patient_blood_pressure.bp_systolic' => 'required|numeric|min:1',
            'patient_blood_pressure.bp_diastolic' => 'required|numeric|min:1',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->clear_new_patient_blood_pressure();
    }

    public function record_patient_blood_pressure()
    {
        $validated_data = $this->validate();
        if ($validated_data) {
            $this->current_patient = Patient::find($this->patient_blood_pressure['patient_id']);
            BloodPressure::create($this->patient_blood_pressure);
            sleep(1);
            $this->emitSelf('hide_modal');
            $this->emitTo('record-patient-blood-pressure', 'blood-pressure-updated', $this->patient_blood_pressure['patient_id']);
        }
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
