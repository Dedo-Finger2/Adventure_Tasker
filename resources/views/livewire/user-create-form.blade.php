<div>
    {{--
        Necessário apensas se tivesse um session->flash() vindo pra cá, mas não tem.
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    --}}

    {{-- FOrmulário, precisa do submit.prevent para evitar que haja como um formuláiro normal --}}
    <form wire:submit.prevent="createUser">
        {{-- Campo de nome --}}
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" wire:model="name"> {{-- wire:model é uma forma de referenciar esse campo com o atributo da classe do componente --}}
            @error('name') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

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

        {{-- Upload de imagens, tudo aqui é apenas o necessário. Com exceção do preview --}}
        <div>
            <label for="password">Imagem de perfil:</label>
            <input accept="image/png, image/jpeg" type="file" name="profile_image" wire:model="profile_image">
            @error('profile_image') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
            {{-- Exibindo um preview da imagem --}}
            @if ($profile_image)
                <br><br><img src="{{ $profile_image->temporaryUrl() }}" alt="preview" class="width: 20px;">
            @endif
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>
