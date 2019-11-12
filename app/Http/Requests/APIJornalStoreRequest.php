<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class APIJornalStoreRequest extends FormRequest
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
            'name_jornal' => 'required|unique:jornals|string|max:60',
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ];
    }
    public function messages()
    {
        return [
            'name_jornal.required' => 'é necessário ter um nome',
            'name_jornal.unique' => ' Esse nome já existe',
            'description.required' => 'é necessário ter descrição',
            'user_id' => 'É necessário saber quem é o responsável do Jornal '
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
