<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class APIContentImageStoreRequest extends FormRequest
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
            'ficheiro_image' => 'required|image|max:3000000',
            'jornal_id' => 'required|exists:jornals,id',
        ];
    }
    public function messages()
    {
        return [
            'ficheiro_image.required' => 'É necessário ter uma imagem',
            'jornal_id.required' =>  'é necessário saber qual é o jornal',
            'ficheiro_image.image' => 'É necessário ser uma imagem',
            'ficheiro_image.max' => ':attribute deve ter :size.',
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
