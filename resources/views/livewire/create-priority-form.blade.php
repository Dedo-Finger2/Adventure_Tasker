<div>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="createPriority">
        {{-- Campo de nome --}}
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" wire:model="name"> {{-- wire:model é uma forma de referenciar esse campo com o atributo da classe do componente --}}
            @error('name') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de exp --}}
        <div>
            <label for="exp">Exp:</label>
            <input type="number" step="0.1" name="exp" wire:model="exp"> {{-- wire:model é uma forma de referenciar esse campo com o atributo da classe do componente --}}
            @error('exp') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de money --}}
        <div>
            <label for="money">Money:</label>
            <input type="number" name="money" wire:model="money">
            @error('money') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        <button type="submit">Criar</button>
    </form>
</div>
