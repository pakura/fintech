<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CmsUserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('cms_user');

        return [
            'email' => 'required|email|unique:cms_users,email,'.$id,
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'role' => 'required',
            'password' => array_merge(
                $this->isMethod('POST') ? ['required'] : ['nullable'],
                ['min:6', 'confirmed']
            )
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $input = parent::all();

        $id = $this->route('cms_user');

        $user = $this->user('cms');

        $input['active'] = $this->has('active') ? 1 : 0;

        if ($user->id == $id) {
            $input['role'] = $user->role;
            $input['active'] = 1;
        } elseif (! in_array($this->get('role'), array_keys(user_roles()))) {
            $input['role'] = null;
        }

        return $input;
    }

    /**
     * Run after validation is completed.
     *
     * @return void
     */
    protected function after()
    {
        if (! $this->has('password')) {
            $this->offsetUnset('password');
        }
    }
}
