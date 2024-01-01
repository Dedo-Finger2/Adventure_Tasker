<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user'); // Obtém o ID do usuário da rota

        return [
            'name' => ['required', 'min:3'],
            'email' => ['email', 'unique:users,email,'. $userId],
            'profile_image' => ['nullable'],
        ];
    }
}
