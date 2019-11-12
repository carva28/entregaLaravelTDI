<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConteudoUpdateRequest extends FormRequest
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
            'tipo_conteudo' => 'string|max:60',
            'ficheiro_conteudo' => 'mimes:mpga,mp3,mp4,avi,jpg,jpeg,png,gif',
            'noticia_id' => 'exists:noticias,id',
            'user_id' => 'exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'tipo_conteudo.required' => 'é necessário ter um tipo de conteudo',
            'noticia_id.required' => 'é necessário saber qual é o jornal',
            'user_id.required' => 'É necessário saber quem é o responsável pela noticia '
        ];
    }
}
