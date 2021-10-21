<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Patient;
use Livewire\Component;
use App\Exports\PatientsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\NotifyUserOfCompletedExport;

class Patients extends Component
{
    public $current_user;
    public $current_user_has_export;
    public $patients;
    public $current_patient;

    public function mount()
    {
        $this->current_user = Auth::user();
        $this->current_user_has_export = false;
    }

    public function export()
    {


        if ($this->current_user) {
            $user_tag = $this->current_user->last_name.$this->current_user->id;
            $file_name = 'patients'.$user_tag.'.csv';
        } else {
            $file_name = 'patients.csv';
        }
        $this->current_user_has_export = true;

        // (new PatientsExport)->queue('patients.csv')->chain([
        //     new NotifyUserOfCompletedExport(request()->user()),
        // ]);
        // (new PatientsExport)->queue('patients.csv');

        // return back()->withSuccess('Export started!');

        // return (new PatientsExport)->download('patients.csv');
        (new PatientsExport)->store($file_name, 'public');
    }

    public function download_export()
    {
        $destination = storage_path('app/public/');
        $file_name = '';
        if ($this->current_user) {
            $user_tag = $this->current_user->last_name.$this->current_user->id;
            $file_name = 'patients'.$user_tag.'.csv';
        } else {
            $file_name = 'patients.csv';
        }
        $path_to_file = $destination.$file_name;
        // $this->current_user_has_export = false;
        return response()->download($path_to_file, $file_name);
    }

    public function render()
    {
        view()->share('title', 'Patients');
        view()->share('header', 'Datatable With 50k fake patient records.');

        return view('livewire.patients')->layout('layouts.app');
    }
}
