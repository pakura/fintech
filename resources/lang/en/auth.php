<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'login' => 'Log in',
    'login_msg' => 'Log in to access the admin area!',
    'forgot_pass' => 'Forgot your password?',
    'remember_me' => 'Remember me',

    // errors
    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'required' => [
        'email' => 'Please enter your email.',
        'password' => 'Please enter your password.'
    ],
    'invalid' => [
        'email' => 'Please enter a valid email address.',
        'password' => 'Password is incorrect.'
    ]

];
