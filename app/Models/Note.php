<?php

namespace Models;

use Models\Abstracts\Model;

class Note extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'content'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [];
}
