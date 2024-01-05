<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemStoreListItems extends Component
{
    use WithPagination; # Ativa a paginação aqui

    public $search = ""; # Atributo que será usado como parâmetro de busca
    public $buy_quantity = 0;


    /**
     * Método responsável por realizar a ação de compra do usuario
     *
     * @param Item $item - Injeção de dependência
     * @return void
     */
    // TODO: Adicionar o item comprado na tabela user_items
    // TODO: Comentar esse método
    public function buyItem(Item $item)
    {
        $userMoney = auth()->user()->attributes[0]->current_money;
        $shopCost = $item->cost * (int)$this->buy_quantity;

        if ($userMoney >= $shopCost && $this->buy_quantity > 0) {
            auth()->user()->attributes[0]->current_money -= $shopCost;

            auth()->user()->attributes[0]->save();
            auth()->user()->save();

            session()->flash("status_buy","Item comprado!");

            $this->dispatch('update_status_navbar');
        }

        if ((int)$this->buy_quantity <= 0) session()->flash("status_buy","Selecione uma quantidade positiva!");

        if ($userMoney < $shopCost) session()->flash("status_buy","Você não tem dinheiro o suficiente para comprar {$this->buy_quantity} items desse!");
    }


    /**
     * Método responsável por renderziar o componente na view
     *
     * @return mixed
     */
    public function render()
    {
        # Items do usuário que serão enviadas para a view
        $items = [];

        # Se a contagem de caracteres na propriedade de busca for maior ou igual a 1...
        if(strlen($this->search) >= 1) {
            # Fazer uma busca das items que possuem o título parecido com o nome buscado pelo usuário
            $items = Item::where('name','like','%'. $this->search .'%')
                ->where('user_id', null)
                ->paginate(5);
        } else {
            # Listar as items do usuário sem ser afetado pela busca do usuário
            $items = Item::where('user_id', null)
                ->paginate(5);
        }

        return view('livewire.item-store-list-items', [
            'items'=> $items,
        ]);
    }
}
