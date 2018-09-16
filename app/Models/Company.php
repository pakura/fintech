<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\FileableTrait;
use Models\Traits\LanguageTrait;
use Models\Traits\HasCollectionTrait;

class Company extends Model
{
    use HasCollectionTrait, LanguageTrait, FileableTrait;

    /**
     * Type of the collection.
     *
     * @var string
     */
    const TYPE = 'companies';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'slug', 'position', 'visible', 'image', 'name', 'gender', 'age_from', 'age_to', 'product_type', 'created_at'
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
    protected $languageTable = 'companies_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'company_id', 'language', 'title'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'company_id', 'language'
    ];
}
