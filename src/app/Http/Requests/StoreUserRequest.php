<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
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
            "type_document" => "string|required",
            "number_document" => "numeric|required|unique:users",
            "name" => "string|required",
            "email" => "email|required|unique:users",
            "password" => "required",
        ];
    }

    /*
    *
    * Get the error messages for the defined validation rules.*
    *
    * @return array
    */
    protected function failedValidation(Validator $validator) {
        $errors = $validator->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors], 422)
        );
    }
}
