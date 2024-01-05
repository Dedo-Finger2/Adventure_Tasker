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

        if ($this->earnMoney($task)) $this->dispatch('update_status_navbar');
        if ($this->earnExp($task)) $this->dispatch('update_status_navbar');

        # Acionar o evento de task_completed
        $this->dispatch('task_completed');
    }


    /**
     * Método responsável por calcular o dinheiro que o usuário ganhou após completar uma tarefa
     *
     * @param Task $task - Injeção de dependência
     * @return bool - verdadeiro se deu certo o ganho de dinheiro do usuário e falso caso tenha dado algum problema
     */
    private function earnMoney(Task $task)
    {
        # Pegando os dados do usuário logado no sistema
        $user = auth()->user();
        # Adicionar dinheiro no atributo current_money do usuário
        $user->attributes[0]->current_money += $task->money;

        # Salvar modificações
        $user->save();
        $user->attributes[0]->save();

        # Retornar um boolean
        return true;
    }


    /**
     * Método responsável por calcular o exp que o usuário ganhou após completar uma tarefa
     *
     * @param Task $task - Injeção de dependência
     * @return bool - verdadeiro se deu certo o ganho de exp do usuário e falso caso tenha dado algum problema
     */
    private function earnExp(Task $task)
    {
        # Pegando os dados do usuário logado no sistema
        $user = auth()->user();
        # Adicionar exp no atributo current_money do usuário
        $user->attributes[0]->current_exp += $task->exp;

        # Salvar modificações
        $user->save();
        $user->attributes[0]->save();

        # Retornar um boolean
        return true;
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
