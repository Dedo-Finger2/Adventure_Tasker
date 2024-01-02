<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\Priority;
use App\Models\Difficulty;

class UserCreateTaskForm extends Component
{
    public $title;
    public $description;
    public $due_date;
    public $recurring;
    public $recurring_type;
    public $priority_id;
    public $difficulty_id;

    // Regras de validação
    protected $rules = [
        "title" => "required|max:255",
        "description" => "nullable|max:255",
        "due_date" => "nullable|date",
        "recurring" => "boolean|nullable",
        "recurring_type" => "required_if:recurring,true",
        "priority_id" => "required|exists:priorities,id",
        "difficulty_id" => "required|exists:difficulties,id",
    ];


    /**
     * Método construtor
     * seu trabalho é simplesmente setar os valores inicias
     * dos campos de priority e difficulty pois sem isso
     * o primeiro valor sempre é nulo
     *
     * @return void
     */
    public function mount()
    {
        $this->priority_id = Priority::first()->id;
        $this->difficulty_id = Difficulty::first()->id;
    }

    public function createTask(Task $taskModel)
    {
        # Validar os dados
        $this->validate();

        # Altera o valor nulo de recurring para um valor boolean equivalente e válido
        if ($this->recurring == null) $this->recurring = false;

        # Tentar criar tarefa
        try {
            $taskModel::create([
                "title"          => $this->title,
                "description"    => $this->description,
                "due_date"       => $this->due_date,
                "recurring"      => $this->recurring,
                "recurring_type" => $this->recurring_type,
                "priority_id"    => $this->priority_id,
                "difficulty_id"  => $this->difficulty_id,
                "user_id"        => auth()->user()->id,
                "exp"            => $this->getTaskExp(),
                "money"          => $this->getTaskMoney(),
            ]);

            # Lançar mensagem de feedback
            session()->flash('message', "Tarefa criada com sucesso!");

            # Acionar um evento de criação de tarefa para atualizar listagem
            $this->dispatch("task_created");

            # Resetar os valores dos inputs após a criação para que possam ser criadas novas tarefas
            $this->reset(['title', 'description', 'due_date', 'recurring', 'recurring_type']);

        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
        }
    }


    /**
     * Método responsável por calcular e retornar a quantidade de exp que a tarefa vai dar
     * prioridade da task * multiplicador da dificuldade
     *
     * @return float
     */
    private function getTaskExp()
    {
        $priority = Priority::find($this->priority_id);
        $difficulty = Difficulty::find($this->difficulty_id);

        return $priority->exp * $difficulty->exp_multiplier;
    }


    /**
     * Método responsável por calcular e retornar a quantidade de dinheiro que a tarefa vai dar
     * prioridade da task * multiplicador da dificuldade
     *
     * @return float
     */
    private function getTaskMoney()
    {
        $priority = Priority::find($this->priority_id);
        $difficulty = Difficulty::find($this->difficulty_id);

        return $priority->money * $difficulty->money_multiplier;
    }



    /**
     * Método responsável por renderizar o componente na view
     *
     * @return mixed
     */
    public function render()
    {
        $priorities = Priority::all();
        $difficulties = Difficulty::all();

        return view('livewire.user-create-task-form', [
            'priorities' => $priorities,
            'difficulties' => $difficulties,
        ]);
    }
}
