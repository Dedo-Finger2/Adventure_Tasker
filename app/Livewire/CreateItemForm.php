<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class CreateItemForm extends Component
{
    public $name;
    public $description;
    public $cover_image;
    public $cost;
    public $benefit;

    protected $rules = [
        'name' => ['required', 'unique:items,name'],
        'description'=> ['nullable'],
        'cover_image' => ['required', 'image'],
        'cost' => ['numeric', 'min:1'],
        'benefit' => ['required'],
        'user_id' => ['nullable', 'exists:users,id']
    ];

    public function createItem(Item $itemModel)
    {
        $this->validate();

        # Guardar a imagem na pasta store e seu caminho numa variável
        if ($this->item_cover) {
            $item_cover_path = $this->item_cover->store('item_cover_uploads', 'public');
        }

        $item = $itemModel::create([
            'name'=> $this->name,
            'description'=> $this->description,
            'cover_image' => $item_cover_path,
            'cost' => $this->cost,
            'benefit' => $this->benefit,
            'user_id' => null,
        ]);

        # Lançar mensagem de feedback
        session()->flash('message', "Tarefa criada com sucesso!");
    }

    public function render()
    {
        return view('livewire.create-item-form');
    }
}
