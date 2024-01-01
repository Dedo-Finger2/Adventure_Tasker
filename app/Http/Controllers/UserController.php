<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

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
     * Método responsável por persistir os dados, já validados através do UserRequest, no banco de dados
     *
     * @param UserRequest $request - Objeto de validação localizado em Http/Requests
     * @return mixed
     */
    public function store(UserRequest $request)
    {
        # Persistir os dados no banco de dados
        $user = User::create($request->all());

        # Autenticar o usuário
        auth()->login($user);

        # Redirecionar o usuário para a Home
        return redirect()->route('home')->with('success','Logado com sucesso!');
    }
}
