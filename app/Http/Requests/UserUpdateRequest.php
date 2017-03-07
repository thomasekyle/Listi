<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
          'email'         => 'email',
          'fname'         => 'required|alpha',
          'lname'         => 'required|alpha',
          'birthday'      => 'date',
          'phone_number'  => 'digits_between:10,11',
          'fax_number'    => 'digits_between:10,11',
          'active'        => 'required',
          'description'   => 'max:255'
        ];
    }
}
