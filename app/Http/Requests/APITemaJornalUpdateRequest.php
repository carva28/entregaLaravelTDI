<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class APITemaJornalUpdateRequest extends FormRequest
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
            'jornal_id' => 'exists:jornals,id',
            'tema_id' => 'exists:temas,id'
        ];
    }

    public function messages(){
        return [
            'tema_id.required' => 'é necessário saber o tema',
            'jornal_id.required' => 'é necessário saber qual é o jornal',
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
