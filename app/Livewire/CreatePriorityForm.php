<?php

namespace App\Livewire;

use App\Models\Priority;
use Livewire\Component;

class CreatePriorityForm extends Component
{
    public $name;
    public $exp;
    public $money;

    // Regras de validação dos dados acima
    protected $rules = [
        "name" => "required|unique:priorities,name",
        "exp" => "required|numeric|min:1",
        "money" => "required|numeric|min:1",
    ];


    /**
     * Método responsável por persistir os dados no banco de dados
     *
     * @param Priority $priorityModel - Injeção de dependência
     * @return void
     */
    public function createPriority(Priority $priorityModel)
    {
        # Validar dados
        $this->validate();

        # Criar nova prioridade
        $priorityModel::create([
            "name" => $this->name,
            "exp" => $this->exp,
            "money" => $this->money,
        ]);

        # Enviar flash message para o usuário
        session()->flash('message', 'Prioridade criada com sucesso!');

        # Retornar para a rota do formulário
        return redirect()->route('priority.create');
    }


    /**
     * Método responsável por renderizar o componente
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.create-priority-form');
    }
}
