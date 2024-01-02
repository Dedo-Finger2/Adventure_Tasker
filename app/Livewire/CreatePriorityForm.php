<?php

namespace App\Livewire;

use App\Models\Priority;
use Livewire\Component;

class CreatePriorityForm extends Component
{
    public $name;
    public $exp;
    public $money;

    protected $rules = [
        "name" => "required|unique:priorities,name",
        "exp" => "required|numeric|min:1",
        "money" => "required|numeric|min:1",
    ];

    public function createPriority(Priority $priorityModel)
    {
        $this->validate();

        $priorityModel::create([
            "name" => $this->name,
            "exp" => $this->exp,
            "money" => $this->money,
        ]);

        session()->flash('message', 'Prioridade criada com sucesso!');

        return redirect()->route('priority.create');
    }

    public function render()
    {
        return view('livewire.create-priority-form');
    }
}
