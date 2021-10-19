<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Patient;

class Patients extends Component
{
    public $patients;
    public $current_patient;

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    // public function mount()
    // {
    //     $this->current_patient = Patient::find(1)->blood_pressure;
    // }

    public function render()
    {
        view()->share('title', 'Patients');
        view()->share('header', 'Datatable With 50k fake patient records.');

        return view('livewire.patients')->layout('layouts.app');
    }
}
