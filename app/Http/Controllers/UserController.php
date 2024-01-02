<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Método responsável por apresentar um formulário de cadastro de usuários
     *
     * @return mixed
     */
    public function create()
    {
        # Retornar a view de cadastro de usuários
        return view("user.create");
    }
}
