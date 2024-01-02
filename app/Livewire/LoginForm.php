<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email;
    public $password;

    protected $rules = [
        "email" => "required|email",
        "password"=> "required",
    ];

    public function auth()
    {
        $this->validate();

        // Lógica de autenticação
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('home');
        } else {
            session()->flash('error', "Email ou senha incorretos!");
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
