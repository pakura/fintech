<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class TranslationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('translation') ?: $this->get('id');

        return [
            'name' => 'required|min:2|max:32|regex:/^\w+$/|unique:translations,name,' . $id,
            'title' => 'required|min:2',
            'value' => 'required'
        ];
    }
}
