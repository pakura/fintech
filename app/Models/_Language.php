<?php

namespace Models;

use Models\Abstracts\Model;

class _Language extends Model
{
    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [];

    /**
     * Create a new Language model instance.
     *
     * @param  \Models\Abstracts\Model  $model
     * @param  array  $attributes
     * @return void
     */
    public function __construct(Model $model, array $attributes = [])
    {
        $this->table = $model->getLanguageTable();

        $this->fillable = $model->getLanguageFillable();

        $this->notUpdatable = $model->getLanguageNotUpdatable();

        parent::__construct($attributes);
    }
}
