<?php

namespace App\Http\Requests\Admin\Author;

use Illuminate\Foundation\Http\FormRequest;

class AuthorFormRequest extends FormRequest
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
        $rules = [
            'nom' => ['required', 'min:2'],
            'prenom' => ['required', 'min:5'],
        ];
        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $rules['image'] = ['file', 'mimes:jpeg,png,jpg'];
        } else {
            $rules['image'] = ['required', 'file', 'mimes:jpeg,png,jpg'];
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ nom est requis.',
            'nom.min' => 'Le champ nom doit contenir au moins :min caractères.',
            'prenom.required' => 'Le champ prénom est requis.',
            'prenom.min' => 'Le champ prénom doit contenir au moins :min caractères.',
            'image.required' => 'L\'image est requise.',
            'image.file' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être au format :values.',
        ];
    }

}
