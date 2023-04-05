<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param $data
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return   [
            'name' => 'required|min:4',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::id()), //не работает эта строка
            ],
            'avatar' => 'nullable',
        ];
    }
}
