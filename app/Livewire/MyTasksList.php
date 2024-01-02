<?php

namespace App\Livewire;

use App\Models\Difficulty;
use App\Models\Priority;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class MyTasksList extends Component
{
    use WithPagination;

    protected $listeners = ['task_created' => 'loadTasks'];

    public function loadTasks()
    {
        $this->render(); // Chama o método render novamente para recarregar as tarefas
    }

    public function render()
    {
        $userTasks = Task::with('user')->where(
            'user_id',
            auth()->user()->id)
            ->paginate(5);

        return view('livewire.my-tasks-list', [
            'tasks' => $userTasks,
        ]);
    }
}
