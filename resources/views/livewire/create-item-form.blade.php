<div>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="createItem">
        {{-- Campo de nome --}}
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" wire:model="name"> {{-- wire:model é uma forma de referenciar esse campo com o atributo da classe do componente --}}
            @error('name') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de descrição --}}
        <div>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" cols="30" rows="10" wire:model='description'></textarea>
            @error('description') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de custo --}}
        <div>
            <label for="cost">Custo:</label>
            <input type="number" step="0.1" name="cost" id="cost" cols="30" rows="10" wire:model='cost'>
            @error('cost') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Campo de bebefício --}}
        <div>
            <label for="benefit">Bebefício:</label>
            <textarea name="benefit" id="benefit" cols="30" rows="10" wire:model='benefit'></textarea>
            @error('benefit') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
        </div>

        {{-- Upload de imagens, tudo aqui é apenas o necessário. Com exceção do preview --}}
        <div>
            <label for="cover_image">Capa:</label>
            <input accept="image/png, image/jpeg" type="file" name="cover_image" wire:model="cover_image">
            @error('cover_image') <span>{{ $message }}</span> @enderror {{-- Mostrando erros de validação --}}
            {{-- Exibindo um preview da imagem --}}
            @if ($cover_image)
                <br><br><img src="{{ $cover_image->temporaryUrl() }}" alt="preview" class="width: 20px;">
            @endif
        </div>

        <button type="submit">Criar</button>
    </form>

</div>
