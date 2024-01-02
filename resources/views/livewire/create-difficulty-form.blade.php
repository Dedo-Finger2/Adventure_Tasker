<div>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="createDifficulty">
        {{-- Campo de nome --}}
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" wire:model="name"> {{-- wire:model é uma forma de referenciar esse campo com o atributo da classe do componente --}}
            @error('name') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de exp_multiplier --}}
        <div>
            <label for="exp_multiplier">Exp Multiplier:</label>
            <input type="number" step="0.01" name="exp_multiplier" wire:model="exp_multiplier">
            @error('exp_multiplier') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de money_multiplier --}}
        <div>
            <label for="money_multiplier">Money Multiplier:</label>
            <input type="number" step="0.01" name="money_multiplier" wire:model="money_multiplier">
            @error('money_multiplier') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        <button type="submit">Criar</button>
    </form>

</div>
