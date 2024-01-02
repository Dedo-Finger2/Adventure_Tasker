<div>
    @if (count($tasks) > 0)
        <form>
            @foreach ($tasks as $task)
                @if ($task->recurring)
                    <p style="color: blue"><input type="checkbox" wire:click='toggleCompleteTask({{ $task->id }})' name="task_id" value="{{ $task->id }}" id="task_id_{{ $task->id }}"> 🔁 {{ $task->title }} <span>➡️</span></p>
                    <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}</span> @else @endif </p>
                @elseif ($task->overdue)
                    <p style="color: red"><input type="checkbox" wire:click='toggleCompleteTask({{ $task->id }})' name="task_id" value="{{ $task->id }}" id="task_id_{{ $task->id }}"> ⬇️{{ $task->title }} <span>➡️</span></p>
                    <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}(OVERDUE)</span> @else @endif </p>
                @else
                    <p><input type="checkbox" wire:click='toggleCompleteTask({{ $task->id }})' name="task_id" value="{{ $task->id }}" id="task_id_{{ $task->id }}"> {{ $task->title }} <span>➡️</span></p>
                    <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}</span> @else @endif </p>
                @endif
                <div style="width: 45%; height: 1px; margin-top: 10px; background: #000;"></div>
            @endforeach
        </form>

        {{ $tasks->links() }}
    @else
        <p>Nenhuma task completa ainda.</p>
    @endif

</div>
