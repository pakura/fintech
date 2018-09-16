<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\FileableTrait;
use Models\Traits\LanguageTrait;
use Models\Traits\HasCollectionTrait;

class Article extends Model
{
    use HasCollectionTrait, LanguageTrait, FileableTrait;

    /**
     * Type of the collection.
     *
     * @var string
     */
    const TYPE = 'articles';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'slug', 'position', 'visible', 'image', 'created_at'
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
    protected $languageTable = 'article_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'article_id', 'language', 'title', 'description', 'content', 'meta_desc'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'article_id', 'language'
    ];
}
