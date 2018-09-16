<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\LanguageTrait;
use Models\Traits\HasCollectionTrait;

class Gallery extends Model
{
    use HasCollectionTrait, LanguageTrait;

    /**
     * Type of the collection.
     *
     * @var string
     */
    const TYPE = 'galleries';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'slug', 'position', 'type', 'visible', 'admin_order_by', 'admin_sort', 'admin_per_page', 'web_order_by', 'web_sort', 'web_per_page', 'image'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [
        'type'
    ];

    /**
     * Related database table name used by the Language model.
     *
     * @var string
     */
    protected $languageTable = 'gallery_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'gallery_id', 'language', 'title', 'meta_desc'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'gallery_id', 'language'
    ];
}
