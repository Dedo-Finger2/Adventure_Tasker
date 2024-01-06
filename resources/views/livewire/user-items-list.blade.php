<div>

    @if (session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif

    @if (count($items) > 0)
        @foreach ($items as $item)
            <span>{{ $item['item']->name }}</span><br>
            <span style="color: gray; font-weight: bold;">{{ $item['item']->benefit }}</span><br>
            <div style="width: 200px; height: 1px; margin-top: 6px; margin-bottom: 6px; background-color: black"></div>
            <span>Count: {{ $item['total'] }}</span> - <button wire:click="useItem({{ $item['item'] }})">Use</button>
            <hr>
        @endforeach
    @else
        <p>Você não possui nenhum item.</p>
    @endif
</div>
