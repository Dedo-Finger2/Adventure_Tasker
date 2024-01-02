<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Difficulty;

class CreateDifficultyForm extends Component
{
    public $name;
    public $exp_multiplier;
    public $money_multiplier;

    // Regras de validação dos dados acima
    protected $rules = [
        "name" => "required|unique:priorities,name",
        "exp_multiplier" => "required|numeric|min:1.05",
        "money_multiplier" => "required|numeric|min:1.05",
    ];


    /**
     * Método responsável por persistir os dados no banco de dados
     *
     * @param Difficulty $difficultyModel - Injeção de dependência
     * @return void
     */
    public function createDifficulty(Difficulty $difficultyModel)
    {
        # Validar dados
        $this->validate();

        # Criar nova prioridade
        $difficultyModel::create([
            "name" => $this->name,
            "exp_multiplier" => $this->exp_multiplier,
            "money_multiplier" => $this->money_multiplier,
        ]);

        # Enviar flash message para o usuário
        session()->flash('message', 'Dificuldade criada com sucesso!');

        # Retornar para a rota do formulário
        return redirect()->route('difficulty.create');
    }


    /**
     * Método responsável por renderizar o componente
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.create-difficulty-form');
    }
}
