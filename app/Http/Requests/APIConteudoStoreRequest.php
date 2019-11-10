<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APIConteudoStoreRequest extends FormRequest
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
            'tipo_conteudo' => 'required|string|max:60',
            'ficheiro_conteudo' => 'required|mimes:mpga,mp3,mp4,avi,jpg,jpeg,png,gif',
            'noticia_id' => 'required|exists:noticias,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(){
        return [
            'titulo_noticia.required' => 'é necessário ter um nome',
            'titulo_noticia.string' => 'Tem que ser uma string',
            'ficheiro_conteudo.required' => 'é necessário ter video,imagem ou som',
            'ficheiro_conteudo.mimes' => 'é necessário ser nos seguintes formatos mpga,mp3,mp4,avi,jpg,jpeg,png,gif',
            'noticia_id.required' => 'é necessário saber qual é a notícia',
            'user_id.required' => 'É necessário saber quem é o responsável pela noticia '
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'data'=> $validator->errors(),
                    'msg' => 'Erro, tente de novo'
                ], 422,
                [
                    'data'=> $validator->errors(),
                    'msg' => 'Não tem acesso'
                ], 401
                
            )
                );
    }
}
