<?php

namespace App\Http\Controllers;

use view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Método responsável por mostrar a tela de login para o usuário
     */
    public function login()
    {
        # Retornar a view de login
        return view("login");
    }


    /**
     * Método responsável por fazer a autenticação do usuário com os
     * dados enviados da teal de login
     *
     * @param Request $request - Objeto com os dados da requisição feita (formulário)
     * @return void
     */
    public function auth(Request $request)
    {
        # Validar as credenciais
        # Tentar autenticar usuário
        # Tentar autenticar administrador
        # Redirecionar usuário de volta pra tela de login com o erro que aconteceu durante a autenticação
    }


    /**
     * Método responsável por encerrar a sessão do usuário
     *
     * @param Request $request - Objeto com os dados da requisição feita
     * @return mixed
     */
    public function logout(Request $request)
    {
        // Deslogar usando Auth::logout();
        Auth::logout();

        // Invalidar a sessão da requisição ($request)
        $request->session()->invalidate();

        // Gerar outro __token de segurança na sessão da requisição
        $request->session()->regenerateToken();

        // Redirecionar o usuário para a tela de login (com uma mensagem talvez)
        return redirect('/login');
    }


}
