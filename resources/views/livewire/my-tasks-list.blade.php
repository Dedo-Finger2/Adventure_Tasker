<div>
    {{-- Se houver uma tarefa mostrar a listagem delas. Senão, mostrar uma mensagem de feedback ao usuário --}}
    @if (count($tasks) > 0)
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif

        {{-- Formulário que lista as tarefas, diferenciando tarefas recorrente, com overdue e tarefas normais --}}
        <form>
            @foreach ($tasks as $task)
                {{-- Tarefas recorrentes --}}
                @if ($task->recurring)
                    <p style="color: blue"><input type="checkbox" wire:click='toggleCompleteTask({{ $task->id }})' name="task_id" value="{{ $task->id }}" id="task_id_{{ $task->id }}"> 🔁 {{ $task->title }} <span>➡️</span></p>
                    <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}</span> @else @endif </p>
                {{-- Tarefas com overdue --}}
                @elseif ($task->overdue)
                    <p style="color: red"><input type="checkbox" wire:click='toggleCompleteTask({{ $task->id }})' name="task_id" value="{{ $task->id }}" id="task_id_{{ $task->id }}"> ⬇️{{ $task->title }} <span>➡️</span></p>
                    <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}(OVERDUE)</span> @else @endif </p>
                {{-- Tarefas normais --}}
                @else
                    <p><input type="checkbox" wire:click='toggleCompleteTask({{ $task->id }})' name="task_id" value="{{ $task->id }}" id="task_id_{{ $task->id }}"> {{ $task->title }} <span>➡️</span></p>
                    <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}</span> @else @endif </p>
                @endif
                {{-- Divisor de tarefas --}}
                <div style="width: 45%; height: 1px; margin-top: 10px; background: #000;"></div>
            @endforeach
        </form>

        {{-- Controle da paginação das tarefas --}}
        {{ $tasks->links() }}
    @else
        {{-- Mensagem de feedback quando não há tarefas listadas --}}
        <p>Nenhuma task está vinculada a você.</p>
    @endif

</div>
