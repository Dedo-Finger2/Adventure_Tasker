<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class UserCompletedTasksList extends Component
{
    use WithPagination; # Habilita paginação no componente

    protected $paginationTheme = "bootstrap";

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

        # Chamar o método render para recarregar a lista
        $this->render();
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
            ->where('completed_at', "!=", null)
            ->paginate(5);

        return view('livewire.user-completed-tasks-list', [
            'tasks' => $userTasks,
        ]);
    }
}
