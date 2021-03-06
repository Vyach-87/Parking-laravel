<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class new_car_Request extends FormRequest
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
          'car_mark*'=>'required',
          'car_model*'=>'required',
          'car_number*'=>'required|alpha_num',
          'car_color*'=>'required'
        ];
    }
}
