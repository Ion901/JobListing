<?php

namespace App\Http\Requests;

use App\Http\Requests\SessionInstance;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class RegisterUserRequest extends SessionInstance
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = parent::rules();
        $rules['role'] = ['required', 'string', Rule::in(['resume', 'vacancy'])];
        $rules['email'] = [...$rules['email'], Rule::unique('users')];
        $rules['password'] = [...$rules['password'], 'confirmed'];

            $rules['employer'] = ['nullable','required_if:role,vacancy', 'string'];
            $rules['logo'] = [
            'required_if:role,vacancy',
                File::types(['png', 'jpg', 'webp']),
                Rule::dimensions()
                    ->width(200)
                    ->height(100)
            ];

           
        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'logo.dimensions' => 'Dimensiunile nu se potrivesc - 200x100px',
        ];
    }
}
