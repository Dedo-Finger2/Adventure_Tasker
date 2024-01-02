<div>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif


    {{-- Formulário, precisa do submit.prevent para evitar que haja como um formuláiro normal --}}
    <form wire:submit.prevent="createTask">
        {{-- Campo de nome --}}
        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" wire:model="title"> {{-- wire:model é uma forma de referenciar esse campo com o atributo da classe do componente --}}
            @error('title') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de descrição --}}
        <div>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" cols="30" rows="10" wire:model='description'></textarea>
            @error('description') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de prazo --}}
        <div>
            <label for="due_date">Prazo:</label>
            <input type="date" name="due_date" wire:model="due_date">
            @error('due_date') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de prioridade --}}
        <div>
            <label for="priority">Prioridade:</label>
            <select name="priority_id" id="priority_id" wire:model='priority_id'>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                @endforeach
            </select>
            @error('priority') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de dificuldade --}}
        <div>
            <label for="difficulty">Dificuldade:</label>
            <select name="difficulty_id" id="difficulty_id" wire:model='difficulty_id'>
                @foreach ($difficulties as $difficulty)
                    <option value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
                @endforeach
            </select>
            @error('difficulty') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de recorrente --}}
        <div>
            <label for="recurring">Recorrente:</label>
            <input type="checkbox" name="recurring" wire:model.lazy="recurring">
            @error('recurring') <span>{{ $message }}</span> @enderror
        </div>

        @if ($recurring)
            <div>
                <label for="recurring_type">Tipo de recorrente:</label>
                <select name="recurring_type" id="recurring_type" wire:model='recurring_type'>
                    <option selected value="1">Diário</option>
                    <option value="2">Semanal</option>
                    <option value="3">Mensal</option>
                </select>
                @error('recurring_type') <span>{{ $message }}</span> @enderror
            </div>
        @endif

        <button type="submit">Criar</button>
    </form>

</div>
