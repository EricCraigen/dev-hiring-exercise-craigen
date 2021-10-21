<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Modal extends Component
{
    public $show = false;
    public $current_user;

    protected $listeners = [
        'show_modal' => 'show',
        'hide_modal' => 'hide'
    ];

    public function boot() {
        $this->current_user = Auth::user();
    }

    public function show() {
        if ($this->current_user ? ($this->current_user->role_id == 2 || $this->current_user->role_id == 3) : false) {
            sleep(1);
            $this->show = true;
        } else {
            session()->flash('create-patient-auth-guard', 'You do not have authorization to do this action!');
        }
    }

    public function hide() {
        sleep(1);
        $this->show = false;
    }
}
