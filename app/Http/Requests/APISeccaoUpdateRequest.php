<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class APISeccaoUpdateRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'data' => $validator->errors(),
                    'msg' => 'Erro, tente de novo'
                ],
                422
            )
        );
    }
}
