<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Il campo "nome" è obbligatorio.',
            'name.string' => 'Il campo "nome" deve essere una stringa.',
            'name.max' => 'Il campo "nome" non può superare i 255 caratteri.',

            'description.string' => 'Il campo "descrizione" deve essere una stringa.',

            'price.required' => 'Il campo "prezzo" è obbligatorio.',
            'price.numeric' => 'Il campo "prezzo" deve essere un numero.',
            'price.min' => 'Il campo "prezzo" deve essere positivo.',
        ];
    }
}
