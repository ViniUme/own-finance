<?php

namespace App\Http\Requests\Admin\Login;

use App\Http\Requests\BaseRequest;

class AdminLoginAuthRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'E-mail é um campo obrigatório',
            'email.email' => 'E-mail precisa ser válido',
            'password.required' => 'Password é um campo obrigatório'
        ];
    }
}
