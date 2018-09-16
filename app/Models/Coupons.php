<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\FileableTrait;
use Models\Traits\LanguageTrait;
use Models\Traits\HasCollectionTrait;

class Coupons extends Model
{
    use HasCollectionTrait, LanguageTrait, FileableTrait;

    /**
     * Type of the collection.
     *
     * @var string
     */
    const TYPE = 'coupons';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'position', 'visible', 'total_count', 'price', 'company_id', 'created_at'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [];

    /**
     * Related database table name used by the Language model.
     *
     * @var string
     */
    protected $languageTable = 'coupons_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'coupons_id', 'language', 'title', 'description', 'content', 'meta_desc'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'coupons_id', 'language'
    ];
}
