<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'cedula'    => 'required|numeric|digits_between:7,9|unique:users,cedula',
            'nombre'   => 'required|alpha|min:3',
            'apellido' => 'required|alpha|min:3',
            'telefono'  => 'required|numeric|digits_between:11,15',
            'email'     => 'required|e-mail|unique:users,email',
            'password'  => 'required|min:6'
        ];
    }
}
