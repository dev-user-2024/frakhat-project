<?php

namespace App\Http\Requests;

use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class ReporterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname'=>'Required',
            'lname'=>'Required',
            'national_code'=>['Required',new Nationalcode],
            'address'=>'Required',
            'picture'=>'mimes:jpg,png',
            'upload_codemili'=>'Required|mimes:jpg,png',
            'phone_number'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {

        throw new \Illuminate\Http\Exceptions\HttpResponseException(

            Response::errors(false,$this->validator->errors())

        );
    }
}
