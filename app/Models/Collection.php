<?php

namespace Models;

use Models\Abstracts\Model;

class Collection extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'collections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title', 'type', 'admin_order_by', 'admin_sort', 'admin_per_page', 'web_order_by', 'web_sort', 'web_per_page', 'description'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [
        'type'
    ];
}
