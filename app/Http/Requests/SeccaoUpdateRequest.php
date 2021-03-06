<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SeccaoUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome_seccao' => 'string|max:60',
            'imagem_seccao' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'nome_seccao.required' => 'é necessário ter um nome',
            'nome_seccao.unique' => 'é necessário ter um nome único',
            'imagem_seccao.image' => 'é necessário ter um dos formatos'
        ];
    }

}
