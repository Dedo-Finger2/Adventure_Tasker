<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DifficultyController extends Controller
{
    /**
     * Método responsável por mostrar a view de criação de dificuldades
     *
     * @return mixed
     */
    public function create()
    {
        return view("difficulty.create");
    }
}
