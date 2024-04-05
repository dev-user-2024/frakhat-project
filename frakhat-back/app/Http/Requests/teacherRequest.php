<?php

namespace App\Http\Requests;

use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class teacherRequest extends FormRequest
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
            'avatar'=>'mimes:jpg,png',
            'card_number'=>'Required',
            'phone_number'=>'Required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'shaba_number'=>'Required',
            'national_code'=>['Required',new Nationalcode],
            'type_learn'=>'Required',
            'hiring_frakhat'=>'Required',
            'University_faculty'=>'Required',
            'status_education'=>'Required',
            'address'=>'Required',
            'fish_water'=>'mimes:jpg,png,pdf',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {

        throw new \Illuminate\Http\Exceptions\HttpResponseException(

            Response::errors(false,$this->validator->errors())

        );
    }

}
