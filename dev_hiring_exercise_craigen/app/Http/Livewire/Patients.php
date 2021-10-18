<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class Patients extends Component
{
    public $patients;

    public function mount()
    {
        // $this->patients = Patient::all();
    }

    public function render()
    {
        view()->share('title', 'Patients');
        view()->share('header', 'Datatable With 50k fake patient records.');

        return view('livewire.patients')->layout('layouts.app');
    }
}
