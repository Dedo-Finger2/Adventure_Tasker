<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class MyTasksList extends Component
{
    use WithPagination;

    public function render()
    {
        $userTasks = Task::with('user')->where('user_id', auth()->user()->id)->get();

        return view('livewire.my-tasks-list', [
            'tasks' => $userTasks,
        ]);
    }
}
