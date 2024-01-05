<div>
    {{-- Formulário de busca de tarefas --}}
    <div>
        <form role="search">
            <input wire:model.live='search' type="search" name="search" id="search" placeholder="Buscar tarefas">
        </form>
    </div>

    {{-- Se houver algum item --}}
    @if (count($items) > 0)
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif

        @if (session()->has('status_buy'))
            <span>{{ session('status_buy') }}</span>
        @endif

        @foreach ($items as $item)
            <div>
                <h2>{{ $item->name }}</h2>
                {{-- Capa do item --}}
                <img src="{{ asset('storage/' . $item->cover_image) }}" alt="cover_image" style="width: 100px;">
                <hr>
                <span>🟡{{ $item->cost }}</span>
                <span>🗒️{{ $item->description }}</span>
                <span>❇️{{ $item->benefit }}</span>

                {{-- TODO: Formulário de compra do item --}}
                <form wire:submit.prevent='buyItem({{ $item }})'>
                    <input type="number" name="quantity-{{ $item->id }}" id="quantity-{{ $item->id }}"
                        wire:model='buy_quantity'>
                    <button>Comprar</button>
                </form>
            </div>
        @endforeach

        {{-- Controle da paginação das tarefas --}}
        {{ $items->links() }}
    @else
        <p>Você não pode comprar nenhum item por agora.</p>
    @endif

</div>
