<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\UserItem;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class UserItemsList extends Component
{
    use WithPagination;

    public function useItem(Item $item)
    {
        $userItem = UserItem::where('item_id', $item->id)->where('user_id', auth() ->user()->id)->first();

        try {
            $userItem->delete();

            session()->flash('message', 'Item usado com sucesso!');

            $this->render();
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }

    public function render()
    {
        $items = UserItem::select('item_id', DB::raw('count(*) as total'))
            ->where('user_id', auth()->user()->id)
            ->groupBy('item_id')
            ->get();

        $items = $items->map(function ($item) {
            $itemDetails = Item::find($item->item_id);
            return [
                'total' => $item->total,
                'item' => $itemDetails
            ];
        });

        return view('livewire.user-items-list', [
            'items' => $items,
        ]);
    }
}
