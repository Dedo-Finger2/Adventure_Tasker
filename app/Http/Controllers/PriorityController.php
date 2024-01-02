<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Método responsável por mostrar a view de criação de prioridades
     *
     * @return mixed
     */
    public function create()
    {
        return view("priority.create");
    }
}
