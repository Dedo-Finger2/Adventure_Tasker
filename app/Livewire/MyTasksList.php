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

    protected $listeners = ['task_created' => 'loadTasks', 'task_completed' => 'loadTasks'];


    public function loadTasks()
    {
        # Chama o método render novamente para recarregar as tarefas
        $this->render();
    }

    public function completeTask($taskId)
    {
        $task = Task::find($taskId);
        $task->completed_at = now();
        $task->save();

        $this->dispatch('task_completed');

        session()->flash('message','Tarefa marcada como concluída!');

    }


    public function render()
    {
        $userTasks = Task::with('user')
            ->where(
            'user_id',
            auth()->user()->id)
            ->where('completed_at', null)
            ->paginate(5);

        return view('livewire.my-tasks-list', [
            'tasks' => $userTasks,
        ]);
    }
}
