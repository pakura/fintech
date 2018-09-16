<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'captcha'              => ':attribute კოდი არასწორია.',
    'confirmed'            => ':attribute არ ემთხვევა.',
    'date'                 => ':attribute არის არასწორი ფორმატის.',
    'date_format'          => 'თარიღი უნდა იყოს :format ფორმატის.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => ':attribute უნდა შედგებოდეს :digits ციფრისგან.',
    'digits_between'       => ':attribute უნდა შეიცავდეს ციფრებს :min-დან :max-მდე.',
    'dimensions'           => ':attribute არის არასწორი ზომის.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute შეყვანილია არასწორი ფორმატით.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => ':attribute უნდა იყოს ფაილი.',
    'filled'               => ':attribute უნდა შეიცავდეს მნიშვნელობას.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute უნდა იყოს მთელი რიცხვი.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute არ უნდა აღემატებოდეს :max-ს.',
        'file'    => ':attribute არ უნდა აღემატებოდეს :max KB-ს.',
        'string'  => ':attribute არ უნდა აღემატებოდეს :max სიმბოლოს.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => ':attribute უნდა იყოს შემდეგი ტიპის: :values.',
    'mimetypes'            => ':attribute უნდა იყოს შემდეგი ტიპის: :values.',
    'min'                  => [
        'numeric' => ':attribute უნდა იყოს მინიმუმ :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => ':attribute უნდა იყოს მინიმუმ :min სიმბოლო.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => ':attribute უნდა შეიცავდეს მხოლოდ რიცხვებს.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute: ფორმატი არასწორია.',
    'required'             => ':attribute აუცილებელია.',
    'required_if'          => ':attribute აუცილებელია როდესაც :other არის :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => ':attribute აუცილებელია, როდესაც :values შეყვანილია.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute უნდა იყოს :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'შეყვანილი :attribute უკვე გამოყენებულია.',
    'uploaded'             => ':attribute ვერ აიტვირთა.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'title' => 'სათაური',
        'value' => 'მნიშვნელობა',
        'text' => 'ტექსტი',
        'description' => 'აღწერა',
        'content' => 'შიგთავსი',

        'name' => 'სახელი',
        'user' => 'მომხმარებელი',
        'username' => 'მომხმარებელის სახელი',
        'fullname' => 'სრული სახელი',
        'firstname' => 'სახელი',
        'lastname' => 'გვარი',
        'email' => 'ელ.ფოსტა',
        'phone' => 'ტელეფონი',
        'password' => 'პაროლი',

        'personal_id' => 'პირადი ნომერი'
    ],

];
