<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EditUser extends Component
{
    public $current_user;
    public $current_role;
    public $roles;

    public function mount()
    {
        $this->current_user = Auth::user();
        $this->roles = Role::all();
        $this->current_role = Auth::check() ? $this->current_user->role_id : 1;
        // ddd($this->current_role);
    }

    public function edit_user_role()
    {
        if ($this->current_user->role_id == 1 || $this->current_user->role_id == 3) {
            session()->flash('auth-guard', 'You are not authorized to do this!');
        } else {
            User::where('id', $this->current_user->id)->update([
                'role_id' => $this->current_role,
            ]);
            sleep(1);
            $this->render();
        }
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
