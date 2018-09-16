<?php

namespace Models;

use Closure;
use Models\Abstracts\Model;
use Models\Traits\FileableTrait;
use Models\Traits\LanguageTrait;
use Models\Traits\PositionableTrait;

class Page extends Model
{
    use LanguageTrait, PositionableTrait, FileableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'slug', 'position', 'parent_id', 'type', 'type_id', 'template', 'visible', 'collapse', 'image'
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
    protected $languageTable = 'page_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'page_id', 'language', 'title', 'short_title', 'description', 'content', 'meta_desc'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'page_id', 'language'
    ];

    /**
     * Get the Collection instance.
     *
     * @param  int  $id
     * @return \Models\Collection|
     *         \Models\Builder\Builder
     */
    public function collection($id = null)
    {
        $model = new Collection;

        return is_null($id) ? $model : $model->where('id', $id);
    }

    /**
     * Build an admin query.
     *
     * @param  int  $id
     * @return \Models\Builder\Builder
     */
    public function forAdmin($id = null)
    {
        return $this->when(! is_null($id), function ($q) use ($id) {
            return $q->menuId($id);
        })->joinLanguage()
            ->joinCollection()
            ->filesCount()
            ->positionAsc();
    }

    /**
     * Build a public query.
     *
     * @param  mixed  $language
     * @return \Models\Builder\Builder
     */
    public function forPublic($language = true)
    {
        return $this->joinLanguage($language)->visible();
    }

    /**
     * Get the base page.
     *
     * @param  array  $columns
     * @param  int|null  $id
     * @param  \Closure|null  $callback
     * @return static
     */
    public function getBasePage($columns = ['*'], $id = null, Closure $callback = null)
    {
        if (! ($id = ($id ?: $this->parent_id))) {
            return $this;
        }

        if (is_null($page = $this->where('id', $id)->forPublic()->first($columns))) {
            return $this;
        }

        if (! $page->parent_id || (! is_null($callback) && $callback($page))) {
            return $page;
        }

        return $this->getBasePage($columns, $page->parent_id, $callback);
    }

    /**
     * Get sub pages.
     *
     * @param  array  $columns
     * @param  bool|int  $recursive
     * @param  int|null  $value
     * @param  string  $key
     * @return \Illuminate\Support\Collection
     */
    public function getSubPages($columns = ['*'], $recursive = false, $value = null, $key = 'parent_id')
    {
        if (! is_array($columns)) {
            $columns = [$columns];
        }

        $columns = current($columns) == '*' ? $columns : array_merge($columns, ['id']);

        $pages = $this->forPublic()->where($key, $value ?: $this->id)->positionAsc()->get($columns);

        if (is_int($recursive) && $recursive > 0) {
            $recursive -= 1;
        }

        return $recursive ? $pages->each(function ($item) use ($columns, $recursive) {
            $item->subPages = $this->getSubPages($columns, $recursive, $item->id);
        }) : $pages;
    }

    /**
     * Determine if the model has a sub page.
     *
     * @return bool
     */
    public function hasSubPage()
    {
        return $this->parentId($this->id)->exists();
    }

    /**
     * Get sibling pages if the model has a parent page.
     *
     * @param  array  $columns
     * @param  bool|int  $recursive
     * @param  bool  $self
     * @param  bool  $firstLevel
     * @return \Illuminate\Support\Collection
     */
    public function getSiblingPages($columns = ['*'], $recursive = false, $self = true, $firstLevel = false)
    {
        if (! $firstLevel && ! $this->parent_id) {
            return $this->newCollection();
        }

        $pages = $this->forPublic();

        if (! $self) {
            $pages->where('id', '<>', (int) $this->id);
        }

        $pages = $pages->parentId($this->parent_id)
            ->menuId($this->menu_id)
            ->positionAsc()
            ->get($columns);

        if ($self && $pages->count() > 1) {
            return $recursive ? $pages->each(function ($item) use ($columns, $recursive) {
                $item->subPages = $this->getSubPages($columns, $recursive, $item->id);
            }) : $pages;
        } else {
            return $pages->make();
        }
    }

    /**
     * Determine if the model has a parent page.
     *
     * @return bool
     */
    public function hasSiblingPage()
    {
        if (! $this->parent_id) {
            return false;
        }

        return $this->parentId($this->parent_id)->exists();
    }

    /**
     * Add a query, which is valid for routing.
     *
     * @param  string  $slug
     * @param  int     $parentId
     * @return \Models\Builder\Builder
     */
    public function byRoute($slug, $parentId)
    {
        return $this->forPublic()->where('slug', $slug)->parentId($parentId);
    }

    /**
     * Add a where "menu_id" clause to the query.
     *
     * @param  int  $id
     * @return \Models\Builder\Builder
     */
    public function menuId($id)
    {
        return $this->where('menu_id', $id);
    }

    /**
     * Add a where "parent_id" clause to the query.
     *
     * @param  int  $id
     * @return \Models\Builder\Builder
     */
    public function parentId($id)
    {
        return $this->where('parent_id', $id);
    }

    /**
     * Add a where "type_id" clause to the query.
     *
     * @param  int     $id
     * @param  string  $operator
     * @return \Models\Builder\Builder
     */
    public function typeId($id, $operator = '=')
    {
        return $this->where('type_id', $operator, $id);
    }

    /**
     * Add a where "visible" clause to the query.
     *
     * @param  int  $value
     * @return \Models\Builder\Builder
     */
    public function visible($value = 1)
    {
        return $this->where('visible', (int) $value);
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

        $page = (new static)->where($column, $value)->first(['slug', 'parent_id']);

        if (is_null($page)) {
            return $this;
        }

        $this->slug = trim($page->slug . '/' . $this->slug, '/');

        return $this->fullSlug($page->parent_id);
    }

    /**
     * Add a "collection" join to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function joinCollection()
    {
        $table = (new Collection)->getTable();

        $columns = [
            $table . '.title as collection_title',
            $table . '.type as collection_type',
        ];

        return $this->leftJoin($table, function ($q) use ($table) {
            return $q->where($this->getTable() . '.type', 'collections')
                ->on('type_id', $table . '.id');
        })->addSelect($columns);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $attributes = [])
    {
        if (isset($attributes['menu_id'])) {
            $attributes['position'] = (int) $this->menuId($attributes['menu_id'])
                    ->max('position') + 1;
        } else {
            $attributes['position'] = (int) $this->max('position') + 1;
        }

        return parent::create($attributes);
    }
}
