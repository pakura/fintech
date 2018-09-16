<?php

namespace Models\Traits;

use Models\_Language;

trait LanguageTrait
{
    /**
     * The _Language instance.
     *
     * @var \Models\_Language
     */
    protected $languageModel;

    /**
     * Create a new language instance, related to this model.
     *
     * @return $this
     */
    public function setLanguage()
    {
        $this->languageModel = new _Language($this);

        return $this;
    }

    /**
     * Get the language instance, related to this model.
     *
     * @return \Models\_Language
     */
    public function getLanguage()
    {
        return $this->languageModel;
    }

    /**
     * Get the table associated with the _Language model.
     *
     * @return string
     */
    public function getLanguageTable()
    {
        return $this->languageTable;
    }

    /**
     * Get the fillable attributes for the _Language model.
     *
     * @return array
     */
    public function getLanguageFillable()
    {
        return (array) $this->languageFillable;
    }

    /**
     * Get the not updatable attributes for the _Language model.
     *
     * @return array
     */
    public function getLanguageNotUpdatable()
    {
        return (array) $this->languageNotUpdatable;
    }

    /**
     * Get the updatable attributes for the _Language model.
     *
     * @param  array   $attributes
     * @param  string  $exclude
     * @return array
     */
    public function getLanguageUpdatable(array $attributes = [], $exclude = null)
    {
        if (is_null($exclude)) {
            $notUpdatable = $this->getLanguageNotUpdatable();
        } else {
            $notUpdatable = (array) $this->{'notUpdatable' . ucfirst($exclude)};
        }

        $updatable = array_flip(array_diff(
            $this->getLanguageFillable(), $notUpdatable
        ));

        return array_intersect_key($attributes, $updatable);
    }

    /**
     * Add a "*_languages" join to the query.
     *
     * @param  mixed  $language
     * @param  bool  $addColumns
     * @return \Models\Builder\Builder
     */
    public function joinLanguage($language = true, $addColumns = true)
    {
        $table = $this->getTable();
        $languageTable = $this->getLanguageTable();

        return $this->leftJoin($languageTable,
            function ($q) use ($table, $languageTable, $language) {
                return $q->on("{$table}.id", "{$languageTable}.{$this->getForeignKey()}")
                    ->when($language === true, function ($q) use ($languageTable) {
                        return $q->where("{$this->getLanguageTable()}.language", language());
                    }, function ($q) use ($languageTable, $language) {
                        if (is_string($language)) {
                            return $q->where("{$languageTable}.language", $language);
                        }

                        return $q;
                    });
            })
            ->when($addColumns, function ($q) use ($table, $languageTable) {
                $languageKey = str_singular($languageTable) . '_id';

                return $q->addSelect([
                    "{$languageTable}.*", "{$languageTable}.id as {$languageKey}", "{$table}.*"
                ]);
            });
    }

    /**
     * Add a where "language" clause to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function currentLanguage()
    {
        return $this->where("{$this->getLanguageTable()}.language", language());
    }

    /**
     * Update the Eloquent model with its related _Language model.
     *
     * @param  array   $attributes
     * @param  array   $options
     * @param  string  $exclude
     * @return int
     */
    public function update(array $attributes = [], array $options = [], $exclude = null)
    {
        parent::update($attributes, $options, $exclude);

        $attributes = $this->getLanguageUpdatable($attributes, $exclude);

        return $this->languageModel->where($this->getForeignKey(), $this->id)
            ->where('language', language())
            ->update($attributes);
    }

    /**
     * Save a new model with its related _Language model and return the instance.
     *
     * @param  array  $attributes
     * @return array
     */
    protected function createLanguage(array $attributes = [])
    {
        $newLanguages = [];

        $languages = languages();

        $attributes[$this->getForeignKey()] = $this->id;

        foreach($languages as $key => $value) {
            $this->setLanguage($this);

            $attributes['language'] = $key;

            $newLanguages[] = $this->languageModel->fill($attributes)->save();
        }

        return $newLanguages;
    }
}
