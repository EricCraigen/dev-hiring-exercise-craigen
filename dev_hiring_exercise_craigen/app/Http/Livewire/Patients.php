<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Exports\PatientsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\NotifyUserOfCompletedExport;

class Patients extends Component
{
    public $current_user;
    public $user_export_tag;
    public $patients;
    public $current_patient;
    public $export_requested;

    public function mount()
    {
        $this->current_user = Auth::user();
    }

    public function set_user_export_tag()
    {
        $this->user_export_tag = $this->current_user->last_name.'_'.$this->current_user->id.'_'.now()->format('Y-m-d');
    }

    public function export()
    {
        if ($this->current_user ? $this->current_user->role_id == 2 : false) {
            $this->set_user_export_tag();
            $file_name = 'patients-'.$this->user_export_tag.'.csv';
            (new PatientsExport)->queue($file_name, 'public')->chain([
                new NotifyUserOfCompletedExport($this->current_user),
            ]);
            $this->export_requested = true;
        } else {
            session()->flash('auth-guard', 'You are not authorized to do this!');
        }
    }

    public function download_export()
    {
        if ($this->current_user->role_id == 2) {
            $destination = storage_path('app/public/');
            $this->set_user_export_tag();
            $file_name = 'patients-'.$this->user_export_tag.'.csv';
            $path_to_file = $destination.$file_name;
            return response()->download($path_to_file, $file_name);
        }
    }

    public function render()
    {
        view()->share('title', 'Patients');
        view()->share('header', 'Datatable With 50k fake patient records.');

        return view('livewire.patients')->layout('layouts.app');
    }
}
