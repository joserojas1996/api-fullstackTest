<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'rut'       => 'required',
            'name'      => 'required',
            'lastname'  => 'required',
            'phone'     => 'required',
            'street'    => 'required',
            'nro'       => 'required',
            'commune'   => 'required'
        ];
    }
}
