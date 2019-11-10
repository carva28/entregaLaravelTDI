<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class APINoticiaStoreRequest extends FormRequest
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
            'titulo_noticia' => 'required|unique:noticias|string|max:60',
            'corpo_noticia' => 'required|string|max:255',
            'jornal_id' => 'required|exists:jornals,id',
            'seccao_id' => 'required|exists:seccaos,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
    public function messages(){
        return [
            'titulo_noticia.required' => 'é necessário ter um titulo',
            'corpo_noticia.required' => 'é necessário ter texto',
            'jornal_id.required' => 'é necessário saber qual é o jornal',
            'seccao_id.required' => 'é necessário ter uma seccao',
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
                ], 422
                
            )
                );
    }
}
