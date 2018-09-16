<?php

namespace App\Http\Requests\Admin;

use Cocur\Slugify\Slugify;
use App\Http\Requests\Request;

class CompanyRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('companies');

        return [
            'title' => 'required|min:2',
            'slug' => 'required|min:2|unique:companies,slug,'.$id,
            'image' => 'required',
            'account' => 'required|min:2',
            'gender' => 'required',
            'age_from' => 'required',
            'age_to' => 'required',
            'product_type' => 'required',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $input = parent::all();

        if ($this->has('slug')) {
            $input['slug'] = (new Slugify)->slugify($input['slug']);
        } else {
            $input['slug'] = (new Slugify)->slugify($this->get('title'));
        }

        $input['name'] = (new Slugify)->slugify($this->get('title'));

        $input['visible'] = $this->has('visible') ? 1 : 0;

        if (! $this->has('created_at')) {
            unset($input['created_at']);
        }

        return $input;
    }
}
