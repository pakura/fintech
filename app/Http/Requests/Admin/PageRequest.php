<?php

namespace App\Http\Requests\Admin;

use Cocur\Slugify\Slugify;
use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class PageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('page');

        return [
            'title' => 'required|min:2',
            'short_title' => 'required|min:2',
            'slug' => 'required|min:2|unique:pages,slug,'.$id,
            'type' => 'required',
            'type_id' => 'nullable|integer'
        ];
    }

    /**
     * Run before validation is completed.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function before(Validator $validator)
    {
        $validator->sometimes('type_id', 'required', function ($input) {
            return in_array($input->type, cms_pages('attached'));
        });
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $input = parent::all();

        if (! $this->has('short_title')) {
            $input['short_title'] = $this->get('title');
        }

        if ($this->has('slug')) {
            $input['slug'] = (new Slugify)->slugify($input['slug']);
        } else {
            $input['slug'] = (new Slugify)->slugify($this->get('title'));
        }

        $input['visible'] = $this->has('visible') ? 1 : 0;

        return $input;
    }
}
