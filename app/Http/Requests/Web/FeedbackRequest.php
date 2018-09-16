<?php

namespace App\Http\Requests\Web;

use App\Http\Requests\Request;

class FeedbackRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'text' => 'required',
            'captcha' => 'required|captcha'
        ];
    }
}
