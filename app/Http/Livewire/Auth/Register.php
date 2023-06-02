<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    
    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => bcrypt($this->password)
        ]);

        if($user) {
            return redirect()->route('login');
        }
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.auth.register')
                ->extends('layouts.app')
                ->section('content');
    }
}