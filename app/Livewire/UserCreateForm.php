<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserAttribute;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserCreateForm extends Component
{
    use WithFileUploads; // Necessário cajo haja upload de imagens/arquivos aqui

    public $name;
    public $email;
    public $password;
    public $profile_image;

    // Regras de validação para os campos acima
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'profile_image' => 'required|sometimes|image|max:1024',
    ];


    /**
     * Método responsável por registrar um novo usuário de forma dinâmica
     *
     * @param User $userModel - Usado apenas para injeção de dependência e para persistir os dados no banco de dados
     * @return mixed
     */
    public function createUser(User $userModel)
    {
        # Validar os dados antes de usar eles
        $this->validate();

        # Guardar a imagem na pasta store e seu caminho numa variável
        if ($this->profile_image) {
            $profile_image_path = $this->profile_image->store('profile_image_uploads', 'public');
        }

        # Persistir os dados validadso no banco de dados
        $user = $userModel::create([
            'name' => $this->name,
            'email'=> $this->email,
            'password' => bcrypt($this->password),
            'profile_image' => $profile_image_path,
        ]);

        # Autenticar usuário
        auth()->login($user);

        # Criar atributos do usuário recem cadastrado
        $this->createUserAttributes($user, new UserAttribute);

        # Redirecionar usuário para a tela de home
        return redirect()->route('home')->with('success', 'Logado com sucesso!');
    }

    private function createUserAttributes(User $user, UserAttribute $userAttribute)
    {
        $userAttribute::create([
            'user_id' => $user->id,
            'current_level' => 0,
            'max_level' => 50,
            'current_exp' => 0,
            'exp_next_level' => 50,
            'current_money' => 0,
            'rebirth_level' => 0,
            'max_bag_slots' => 2,
            'max_powerups_at_time' => 1,
            'max_pwoerups_a_day' => 2,
            'overdue_debuff_value' => 0.25,
            'sub_task_debuff_value' => 0.25,
        ]);
    }

    public function render()
    {
        return view('livewire.user-create-form');
    }
}
