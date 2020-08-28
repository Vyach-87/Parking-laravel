<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class myRequest extends FormRequest
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
          'client_name'=>'required|min:3|max:50',
          'client_phone'=>'required|digits_between:6,11',
          'car_mark*'=>'required',
          'car_model*'=>'required',
          'car_number*'=>'required|alpha_num',
          'car_color*'=>'required'
        ];
    }
}
