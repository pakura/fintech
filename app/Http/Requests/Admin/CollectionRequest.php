<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CollectionRequest extends Request
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
            'type' => 'required',
            'admin_order_by' => 'required',
            'admin_sort' => 'required',
            'admin_per_page' => 'required|numeric|min:1|max:50',
            'web_order_by' => 'required',
            'web_sort' => 'required',
            'web_per_page' => 'required|numeric|min:1|max:50'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $input = parent::all();

        if (! array_key_exists($this->get('type'), cms_collections('types'))) {
            $input['type'] = null;
        }

        $orderList = cms_collections('order_by');

        if (! array_key_exists($this->get('admin_order_by'), $orderList)) {
            $input['admin_order_by'] = null;
        }

        if (! array_key_exists($this->get('web_order_by'), $orderList)) {
            $input['web_order_by'] = null;
        }

        $sortList = cms_collections('sort');

        if (! array_key_exists($this->get('admin_sort'), $sortList)) {
            $input['admin_sort'] = null;
        }

        if (! array_key_exists($this->get('web_sort'), $sortList)) {
            $input['web_sort'] = null;
        }

        return $input;
    }
}
