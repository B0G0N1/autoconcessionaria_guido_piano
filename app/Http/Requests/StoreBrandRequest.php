<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:brands,name',
            'phone' => 'required|string|max:15|regex:/^[0-9\-\(\)\/\+\s]*$/',
            'address' => 'required|string|max:100',
            'thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'name.required' => 'Il campo "azienda" è obbligatorio.',
            'name.string' => 'Il campo "azienda" deve essere una stringa.',
            'name.max' => 'Il campo "azienda" non può superare i 100 caratteri.',
            'name.unique' => 'Questa azienda è già presente nel database, inserire un nome univoco.',
            
            'phone.required' => 'Il campo "telefono" è obbligatorio.',
            'phone.string' => 'Il campo "telefono" deve essere una stringa.',
            'phone.max' => 'Il campo "telefono" non può superare i 15 caratteri.',
            'phone.regex' => 'Il campo "telefono" deve contenere solo numeri, spazi, trattini o simboli consentiti.',
            
            'address.required' => 'Il campo "indirizzo" è obbligatorio.',
            'address.string' => 'Il campo "indirizzo" deve essere una stringa.',
            'address.max' => 'Il campo "indirizzo" non può superare i 100 caratteri.',
            
            'thumb.image' => 'Il campo "thumb" deve essere un\'immagine.',
            'thumb.mimes' => 'Il campo "thumb" deve essere un file di tipo: jpeg, png, jpg, gif.',
            'thumb.max' => 'Il campo "thumb" non può superare i 2048 KB.',
        ];
    }
}
