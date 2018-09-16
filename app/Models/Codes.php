<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\FileableTrait;
use Models\Traits\LanguageTrait;
use Models\Traits\HasCollectionTrait;

class Codes extends Model
{
    use HasCollectionTrait, LanguageTrait, FileableTrait;

    /**
     * Type of the collection.
     *
     * @var string
     */
    const TYPE = 'coupons_codes';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'code', 'status', 'coupon_id', 'company_id', 'position', 'visible'
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
    protected $languageTable = 'coupons_codes_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'code_id', 'language'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'code_id', 'language'
    ];
}
