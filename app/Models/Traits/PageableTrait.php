<?php

namespace Models\Traits;

use Models\Page;

trait PageableTrait
{
    /**
     * Add a "pages" join to the query.
     *
     * @param  string  $type
     * @param  string  $foreignKey
     * @return \Models\Builder\Builder
     */
    public function joinPage($type = 'right', $foreignKey = 'collection_id')
    {
        return $this->join('pages', $foreignKey, 'type_id', $type)
            ->leftJoin('page_languages', function ($q) {
                return $q->on('page_languages.page_id', 'pages.id')
                    ->where(function ($q) {
                        return $q->where('page_languages.language', language())
                            ->orWhereNull('page_languages.language');
                    });
            })->where('pages.visible', 1)->addSelect([
                'pages.parent_id',
                'pages.slug as parent_slug',
                'page_languages.title as parent_title'
            ]);
    }

    /**
     * Concatenate current model slug to its parent pages slug recursively.
     *
     * @param  int|null  $value
     * @param  string|null  $column
     * @return $this
     */
    public function fullSlug($value = null, $column = null)
    {
        if (is_null($column)) {
            $column = $this->getKeyName();
        }

        if (! ($value = (is_null($value) ? $this->parent_id : $value))) {
            return $this;
        }

        $model = (new Page)->where($column, $value)->first(['slug', 'parent_id']);

        if (is_null($model)) {
            return $this;
        }

        $model->fullSlug();

        $this->parent_slug = trim($model->slug . '/' . $this->parent_slug, '/');

        return $this;
    }
}
