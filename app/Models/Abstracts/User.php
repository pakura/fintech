<?php

namespace Models\Abstracts;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

abstract class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
}
