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

    public function toggleCompleteTask($taskId)
    {
        $task = Task::find($taskId);

        $task->completed_at = $task->completed_at != null ? null : now();
        $task->save();

        session()->flash('message','Tarefa marcada como concluída!');

        $this->dispatch('task_completed');
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
