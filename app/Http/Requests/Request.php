<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance()->after(function ($validator) {
            if (method_exists($this, 'after')) {
                $this->after($validator);
            }
        });

        if (method_exists($this, 'before')) {
            $this->before($validator);
        }

        return $validator;
    }
}
