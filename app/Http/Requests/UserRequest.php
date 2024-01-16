<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('user') ? $this->route('user') : null;
        return [
            'user_name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id, 'id')],
            'password' => [$id ? 'nullable' : 'required', 'string'],
        ];
    }
}
