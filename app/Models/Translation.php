<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\LanguageTrait;

class Translation extends Model
{
    use LanguageTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'type'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [
        'name'
    ];

    /**
     * Related database table name used by the Language model.
     *
     * @var string
     */
    protected $languageTable = 'translation_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'translation_id', 'language', 'value'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'translation_id', 'language'
    ];

    /**
     * Build a query by name.
     *
     * @param  string  $name
     * @return \Models\Builder\Builder
     */
    public function byName($name)
    {
        return $this->joinLanguage()->where('name', $name);
    }
}
