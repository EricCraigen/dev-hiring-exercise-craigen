<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Patient;
use App\Exports\PatientsExport;
use Maatwebsite\Excel\Facades\Excel;

class Patients extends Component
{
    public $patients;
    public $current_patient;

    public function export()
    {
        // (new PatientsExport)->queue('invoices.xlsx')->chain([
        //     new NotifyUserOfCompletedExport(request()->user()),
        // // ]);
        // (new PatientsExport)->queue('patients.csv');

        // return back()->withSuccess('Export started!');

        return (new PatientsExport)->download('patients.csv');
    }

    public function render()
    {
        view()->share('title', 'Patients');
        view()->share('header', 'Datatable With 50k fake patient records.');

        return view('livewire.patients')->layout('layouts.app');
    }
}
