<div>
    @if (session()->has('error'))
        <div>{{ session('error') }}</div>
    @endif
    {{-- Formulário, precisa do submit.prevent para evitar que haja como um formuláiro normal --}}
    <form wire:submit.prevent="auth">
        {{-- Campo de email --}}
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" wire:model="email">
            @error('email') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de senha --}}
        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" wire:model="password">
            @error('password') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        <button type="submit">Login</button>
        <a href="{{ route('user.create') }}">Fazer cadastro</a>
    </form>
</div>
