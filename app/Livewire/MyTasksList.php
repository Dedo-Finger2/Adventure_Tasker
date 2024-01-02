<?php

namespace App\Livewire;

use App\Models\Difficulty;
use App\Models\Priority;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class MyTasksList extends Component
{
    use WithPagination; # Habilita paginação no componente

    # Ouvintes: Eles são como triggers, podendo executar ações que outro componente pedir
    protected $listeners = ['task_created' => 'loadTasks', 'task_completed' => 'loadTasks'];


    /**
     * Método responsável por recarregar a lista de tarefas
     * Usado quando uma tarefa é completada ou criada
     *
     * @return void
     */
    public function loadTasks()
    {
        # Chamar o método render novamente para recarregar as tarefas listadas
        $this->render();
    }


    /**
     * Muda o status da tarefa de concluída para não concluída e vice versa
     *
     * @param int $taskId - ID da tarefa que foi concluída
     * @return void
     */
    public function toggleCompleteTask($taskId)
    {
        # Encontrar a tarefa
        $task = Task::find($taskId);

        # Se ela estiver completa, então descompletar, caso contrário, compeltar ela
        $task->completed_at = $task->completed_at != null ? null : now();
        # Salvar quaisquer alterações
        $task->save();

        # Lançar uma mensagem
        session()->flash('message','Tarefa marcada como concluída!');

        # Acionar o evento de task_completed
        $this->dispatch('task_completed');
    }


    /**
     * Método responsável por renderizar e listar as tarefas
     *
     * @return mixed
     */
    public function render()
    {
        # Listar as tarefas do usuário que não foram copletas ainda
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
