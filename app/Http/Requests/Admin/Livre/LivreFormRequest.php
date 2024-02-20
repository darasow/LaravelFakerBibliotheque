<?php

namespace App\Http\Requests\Admin\Livre;

use Illuminate\Foundation\Http\FormRequest;

class LivreFormRequest extends FormRequest
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
            'author_id' => ['exists:authors,id', 'required'],
            'titre' => ['required', 'min:3'],
        ];
        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $rules['image'] = ['file', 'mimes:jpeg,png,jpg'];
        } else {
            $rules['image'] = ['required', 'file', 'mimes:jpeg,png,jpg'];
        }
        return $rules;
    }
}
