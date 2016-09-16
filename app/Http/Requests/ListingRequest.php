<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ListingRequest extends Request
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
          'unit_name'     => 'required',
          'house_num'     => 'required|digits_between:1,10',
          'street_name'   => 'required',
          'apt_num'       => 'alpha_num',
          'city'          => 'required',
          'state'         => 'required|alpha',
          'zip'           => 'required|digits_between:5,5',
          'sq_ft'         => 'required|digits_between:1,20',
          'price'         => 'required|digits_between:1,20',
          'type'          => 'required',
          'bedrooms'      => 'required',
          'bathrooms'     => 'required'
        ];
    }
}
