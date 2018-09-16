<?php

namespace Models;

use Models\Abstracts\Model;
use Models\Traits\LanguageTrait;
use Models\Traits\PositionableTrait;

class Slider extends Model
{
    use LanguageTrait, PositionableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position', 'visible', 'link', 'file'
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
    protected $languageTable = 'slider_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'slider_id', 'language', 'title', 'description'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'slider_id', 'language'
    ];

    /**
     * Get the mutated file attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getFileDefaultAttribute($value)
    {
        return $value ?: asset('assets/images/album-img-1.png');
    }

    /**
     * Build a query for admin.
     *
     * @return \Models\Builder\Builder
     */
    public function forAdmin()
    {
        return $this->joinLanguage()->positionDesc();
    }

    /**
     * Build a public query.
     *
     * @return \Models\Builder\Builder
     */
    public function forPublic()
    {
        return $this->joinLanguage()->where('visible', 1)
            ->whereNotNull('file')
            ->where('file', '!=', '')
            ->positionDesc();
    }
}
