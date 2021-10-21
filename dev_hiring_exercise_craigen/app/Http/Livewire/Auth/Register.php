<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    public $first_name = '';
    public $last_name = '';
    // public $user_name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $role;

    public function mount()
    {
        // $this->role = Role::where('name', 'Administrator')->get();
        // ddd($this->role);
    }

    public function register()
    {
        $this->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            // 'user_name' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
        ]);

        // $roles = Role::where('name', 'Administrator')->get();
        // ddd($roles);

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            // 'user_name' => $this->user_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => 2,
        ]);
        // $user->roles()->attach($this->role->getId());

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
