<?php

namespace App\Http\Requests\Admin;

use Cocur\Slugify\Slugify;
use App\Http\Requests\Request;

class CouponsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('coupons');

        return [
            'title' => 'required|min:2',
            'price' => 'required|numeric',
            'company_id' => 'required',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $input = parent::all();

        $input['visible'] = $this->has('visible') ? 1 : 0;

        if (! $this->has('created_at')) {
            unset($input['created_at']);
        }

        return $input;
    }
}
