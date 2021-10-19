<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class RecordPatientBloodPressure extends Component
{
    public $current_patient;
    public $toggle_search_param;
    public $patient_id;
    public $patient_last_name;
    public $patient_search_results;
    public $patient_search_results_most_recent_bp;
    public $search_error;

    protected $listeners = [
        'record-blood-pressure' => 'update_most_recent_bp',
    ];

    // public function mount()
    // {

    //     // $this->current_patient = Patient::find(1)->blood_pressure;
    // }

    public function patient_search_by_id()
    {
        $this->patient_search_results = Patient::find($this->patient_id);
        if ($this->patient_search_results){
            $this->patient_search_results_most_recent_bp = Patient::find($this->patient_id)->blood_pressure;
            $this->emit('set_current_patient_for_blood_pressure_input', $this->patient_id);
        } else {
            $this->search_error = 'There are no patients with that Id in our records. Please verifiy that you have the correct Id. <br /> If the patient needs to be created in the system, you can do that <x-button wire:click.prevent="$emitTo(\'create-patient-modal\', \'show_modal\')" class="bg-indigo-900 hover:bg-green-700 rounded-lg hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-5 py-3 mt-5">Create New Patient</x-button>';
        }
    }

    // public function patient_search_by_last_name()
    // {
    //     $this->patient_search_results = Patient::where('last_name', 'LIKE', $this->patient_last_name)->get();
    //     // ddd(json_encode($this->patient_search_results));
    //     if ($this->patient_search_results != null){
    //         // ddd(json_encode($this->patient_search_results));
    //         json_encode($this->patient_search_results);
    //         // $this->patient_search_results_most_recent_bp = Patient::find($this->patient_id)->blood_pressure;
    //         // $this->emit('set_current_patient_for_blood_pressure_input', $this->patient_id);
    //     } else {
    //         // $this->search_error = 'There are no patients with that last name in our records. Please verifiy that you have the correct Id. <br /> If the patient needs to be created in the system, you can do that <x-button wire:click.prevent="$emitTo(\'create-patient-modal\', \'show_modal\')" class="bg-indigo-900 hover:bg-green-700 rounded-lg hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-5 py-3 mt-5">Create New Patient</x-button>';
    //     }
    // }

    public function update_most_recent_bp()
    {
        $this->patient_search_results_most_recent_bp = Patient::find($this->patient_id)->blood_pressure;
        $this->refresh();
    }

    public function render()
    {

        view()->share('title', 'Record Patient Blood Pressure');
        view()->share('header', 'A simple form allowing you to record a patients blood pressure');

        return view('livewire.record-patient-blood-pressure')->layout('layouts.app');
    }
}
