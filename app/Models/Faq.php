<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\LanguageTrait;
use Models\Traits\HasCollectionTrait;

class Faq extends Model
{
    use HasCollectionTrait, LanguageTrait;

    /**
     * Type of the collection.
     *
     * @var string
     */
    const TYPE = 'faq';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faq';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'position', 'visible'
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
    protected $languageTable = 'faq_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'faq_id', 'language', 'title', 'description'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'faq_id', 'language'
    ];
}
