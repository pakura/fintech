<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class MenuRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:250'
        ];
    }
}
