<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdServicioRequest extends Request
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
            'img1' => 'mimes:jpg,jpeg',
            'img2' => 'mimes:jpg,jpeg',
            'img3' => 'mimes:jpg,jpeg',
        ];
    }
}
