<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class FaqRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $input = parent::all();

        $input['visible'] = $this->has('visible') ? 1 : 0;

        return $input;
    }
}
