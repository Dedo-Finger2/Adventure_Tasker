<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email;
    public $password;

    // Regras de validação para os atributos acima
    protected $rules = [
        "email" => "required|email",
        "password"=> "required",
    ];


    /**
     * Método responsável por autenticar o usuário que esta fazendo login no sistema
     *
     * @return void
     */
    public function auth()
    {
        # Validar dados
        $this->validate();

        # Autenticar o usuário
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            # Enviar ele para a home page
            return redirect()->intended('home');
        } else {
            # # Retornar um erro caso não seja possível autenticar
            session()->flash('error', "Email ou senha incorretos!");
        }
    }

    
    /**
     * Método responsável por renderizar o componente
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.login-form');
    }
}
