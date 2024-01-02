<div>

    <form wire:submit.prevent="completeTask">
        @foreach ($tasks as $task)
            @if ($task->recurring)
                <p style="color: blue"><input type="checkbox" name="id" value="{{ $task->id }}" id="id"> 🔁 {{ $task->title }} <span>➡️</span></p>
                <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}</span> @else @endif </p>
            @elseif ($task->overdue)
                <p style="color: red"><input type="checkbox" name="id" value="{{ $task->id }}" id="id"> ⬇️{{ $task->title }} <span>➡️</span></p>
                <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}(OVERDUE)</span> @else @endif </p>
            @else
                <p><input type="checkbox" name="id" value="{{ $task->id }}" id="id"> {{ $task->title }} <span>➡️</span></p>
                <p><span>💵{{ $task->money }}</span> | <span>🌟{{ $task->exp }}</span> @if ($task->due_date)  | <span>📅{{ $task->due_date }}</span> @else @endif </p>
            @endif
            <div style="width: 45%; height: 1px; margin-top: 10px; background: #000;"></div>
        @endforeach
    </form>
    
    {{ $tasks->links() }}
</div>
