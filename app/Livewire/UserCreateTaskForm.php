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

    public function mount()
    {
        $this->priority_id = Priority::first()->id;
        $this->difficulty_id = Difficulty::first()->id;
    }

    public function createTask(Task $taskModel)
    {
        # Validar os dados
        $this->validate();

        if ($this->recurring == null) $this->recurring = false;

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

            session()->flash('message', "Tarefa criada com sucesso!");

            $this->dispatch("task_created");

            $this->reset(['title', 'description', 'due_date', 'recurring', 'recurring_type']);

        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
        }
    }

    private function getTaskExp()
    {
        $priority = Priority::find($this->priority_id);
        $difficulty = Difficulty::find($this->difficulty_id);

        return $priority->exp * $difficulty->exp_multiplier;
    }

    private function getTaskMoney()
    {
        $priority = Priority::find($this->priority_id);
        $difficulty = Difficulty::find($this->difficulty_id);

        return $priority->money * $difficulty->money_multiplier;
    }

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
