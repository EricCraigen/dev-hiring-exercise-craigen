<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;

    protected $listeners = [
        'show_modal' => 'show',
        'hide_modal' => 'hide'
    ];

    public function show() {
        sleep(1);
        $this->show = true;
    }

    public function hide() {
        sleep(1);
        $this->show = false;
    }
}
