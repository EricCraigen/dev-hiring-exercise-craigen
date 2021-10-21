<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        view()->share('title', 'Welcome');
        view()->share('header', 'Dev Hiring Exercise - Craigen');

        return view('livewire.welcome')->layout('layouts.app');
    }
}
