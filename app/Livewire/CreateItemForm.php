<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateItemForm extends Component
{
    use WithFileUploads;

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
    ];

    public function createItem(Item $itemModel)
    {
        $this->validate();

        # Guardar a imagem na pasta store e seu caminho numa variável
        if ($this->cover_image) {
            $item_cover_path = $this->cover_image->store('item_cover_uploads', 'public');
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
        session()->flash('message', "Item criado com sucesso!");

        # Resetar os valores dos inputs após a criação para que possam ser criadas novas tarefas
        $this->reset(['name', 'description', 'cover_image', 'cost', 'benefit']);
    }

    public function render()
    {
        return view('livewire.create-item-form');
    }
}
