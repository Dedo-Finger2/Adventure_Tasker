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


    /**
     * Método responsável por carregar o perfil do usuário
     *
     * @return mixed
     */
    public function profile()
    {
        # Retornar a view de perfil do usuário
        return view("user.profile");
    }


    /**
     * Método responsável por carregar as tarefas do usuário
     *
     * @return mixed
     */
    public function myTasks()
    {
        return view("user.my-tasks");
    }


    public function myInventory()
    {
        return view('user.my-inventory');
    }
}
