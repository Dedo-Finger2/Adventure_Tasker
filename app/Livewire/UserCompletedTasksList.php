<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class UserCompletedTasksList extends Component
{
    use WithPagination;

    public function toggleCompleteTask($taskId)
    {
        $task = Task::find($taskId);

        $task->completed_at = $task->completed_at != null ? null : now();
        $task->save();

        session()->flash('message','Tarefa marcada como concluída!');

        $this->render();
    }

    public function render()
    {
        $userTasks = Task::with('user')
            ->where(
            'user_id',
            auth()->user()->id)
            ->where('completed_at', "!=", null)
            ->paginate(5);

        return view('livewire.user-completed-tasks-list', [
            'tasks' => $userTasks,
        ]);
    }
}
