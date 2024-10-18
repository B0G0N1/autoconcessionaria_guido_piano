<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:30',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:15',
            'price' => 'required|numeric|min:0',
            'engine' => 'required|string|max:30',
            'horsepower' => 'required|integer|min:0|max:9999',
            'doors' => 'required|integer|min:2|max:5',
            'km' => 'required|integer|min:0',
            'used' => 'required|boolean',
            'thumb' => 'nullable|url',
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
            'brand_id.required' => 'Il campo "Marca" è obbligatorio.',
            'brand_id.exists' => 'Il brand selezionato non esiste.',

            'model.required' => 'Il campo "Modello" è obbligatorio.',
            'model.string' => 'Il campo "Modello" deve essere una stringa.',
            'model.max' => 'Il campo "Modello" non può superare i 30 caratteri.',

            'year.required' => 'Il campo "Anno" è obbligatorio.',
            'year.integer' => 'Il campo "Anno" deve essere un numero intero.',
            'year.min' => 'Il campo "Anno" non può essere inferiore a 1900.',
            'year.max' => 'Il campo "Anno" non può essere superiore all\'anno corrente.',

            'color.required' => 'Il campo "Colore" è obbligatorio.',
            'color.string' => 'Il campo "Colore" deve essere una stringa.',
            'color.max' => 'Il campo "Colore" non può superare i 15 caratteri.',

            'price.required' => 'Il campo "Prezzo" è obbligatorio.',
            'price.numeric' => 'Il campo "Prezzo" deve essere un numero.',
            'price.min' => 'Il campo "Prezzo" deve essere positivo.',

            'engine.required' => 'Il campo "Motore" è obbligatorio.',
            'engine.string' => 'Il campo "Motore" deve essere una stringa.',
            'engine.max' => 'Il campo "Motore" non può superare i 30 caratteri.',

            'horsepower.required' => 'Il campo "Cavalli" è obbligatorio.',
            'horsepower.integer' => 'Il campo "Cavalli" deve essere un numero intero.',
            'horsepower.min' => 'Il campo "Cavalli" deve essere almeno 0.',
            'horsepower.max' => 'Il campo "Cavalli" non può superare 9999.',

            'doors.required' => 'Il campo "Porte" è obbligatorio.',
            'doors.integer' => 'Il campo "Porte" deve essere un numero intero.',
            'doors.min' => 'Il numero minimo di "Porte" è 2.',
            'doors.max' => 'Il numero massimo di "Porte" è 5.',

            'km.required' => 'Il campo "Chilometri" è obbligatorio.',
            'km.integer' => 'Il campo "Chilometri" deve essere un numero intero.',
            'km.min' => 'Il campo "Chilometri" deve essere almeno 0.',

            'used.required' => 'Il campo "Usato" è obbligatorio.',
            'used.boolean' => 'Il campo "Usato" deve essere vero (Sì) o falso (No).',

            'thumb.url' => 'Il campo "Thumb" deve essere un URL valido.',
        ];
    }
}
