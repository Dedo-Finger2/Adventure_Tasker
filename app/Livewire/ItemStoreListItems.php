<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemStoreListItems extends Component
{
    use WithPagination; # Ativa a paginação aqui

    public $search = ""; # Atributo que será usado como parâmetro de busca


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
