<?php

namespace App\Livewire;

use Livewire\Component;

class UserStatusNavbar extends Component
{
    public $level;
    public $money;
    public $current_exp;
    public $exp_next_level;

    # Eventos que essa classe vai ouvir e executar uma ação se necessário
    protected $listeners = ['update_status_navbar' => 'loadStatus'];


    /**
     * Método responsável por carregar os atributos do componente
     * Ele funciona como se fosse um __construct()
     *
     * @return void
     */
    public function mount()
    {
        $user = auth()->user();

        $this->level = $user->attributes[0]->current_level;
        $this->money = $user->attributes[0]->current_money;
        $this->current_exp = $user->attributes[0]->current_exp;
        $this->exp_next_level = $user->attributes[0]->exp_next_level;
    }


    /**
     * Método responsável por recarregar o componente dos status do usuário para que assim possa
     * ser mostado a versão mais atual dos elementos sem necessidade de recarregar a página
     *
     * @return void
     */
    public function loadStatus()
    {
        $this->mount();
        $this->render();
    }


    /**
     * Renderizando o componente
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.user-status-navbar');
    }
}
