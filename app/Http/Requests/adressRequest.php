<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adressRequest extends FormRequest
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
            'living_place' => 'required| alpha:ascii',
            'street' => 'required| alpha:ascii',
            'index' => 'required| max: 99999| numeric',
            'house' => 'required| max: 999| numeric',
            'flat' => 'required| max: 999| numeric',
            'user_name' => 'required| alpha:ascii| max: 60',
            'surname' => 'required| alpha:ascii| max: 60',
            'mail' => 'required| email',
            'phone' => 'required| max: 99999999999| numeric',
        ];
    }
}
