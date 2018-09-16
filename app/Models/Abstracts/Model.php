<?php

namespace Models\Abstracts;

use Models\Builder\Builder;
use Models\Traits\LanguageTrait;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class Model extends BaseModel
{
    /**
     * The Eloquent builder instance.
     *
     * @var \Models\Builder\Builder|null
     */
    protected $builder;

    /**
     * Indicates if the model has a languages.
     *
     * @var bool
     */
    protected $hasLanguage = false;

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set language model if it's used into the called model.
        if (in_array(LanguageTrait::class, trait_uses_recursive($this))) {
            $this->setLanguage();

            $this->hasLanguage = true;
        }
    }

    /**
     * Determine if a model has a languages.
     *
     * @return bool
     */
    public function hasLanguage()
    {
        return $this->hasLanguage;
    }

    /**
     * Set the updatable attributes for the model.
     *
     * @param  string|null  $exclude
     * @return void
     */
    public function setFillableByUpdatable($exclude = null)
    {
        if (! ($hasUpdatable = ! empty($this->updatable)) && empty($this->notUpdatable)) {
            return;
        }

        $property = is_null($exclude) ? 'updatable' : 'updatable' . ucfirst($exclude);

        if ($hasUpdatable) {
            $fillable = array_intersect($this->fillable, (array) $this->{$property});
        } else {
            $fillable = array_diff(
                $this->fillable,
                (array) $this->{'not' . ucfirst($property)}
            );
        }

        $this->fillable($fillable);
    }

    /**
     * {@inheritdoc}
     */
    public function newEloquentBuilder($builder)
    {
        if ($this->builder instanceof Builder) {
            $builder = $this->builder;

            $this->builder = null;

            return $builder;
        }

        return new Builder($builder, $this);
    }

    /**
     * Set the Eloquent query builder instance.
     *
     * @param  \Models\Builder\Builder  $builder
     * @return $this
     */
    public function setEloquentBuilder(Builder $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * Find a model by its query or return new static.
     *
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static
     */
    public function firstNew($columns = ['*'])
    {
        if (! is_null($model = $this->first($columns))) {
            return $model;
        }

        return new static;
    }

    /**
     * Execute the query and get the first result attribute.
     *
     * @param  string  $attribute
     * @param  int|null  $id
     * @param  mixed  $default
     * @return mixed
     */
    public function firstAttr($attribute, $id = null, $default = null)
    {
        $model = $this->when(! is_null($id), function ($q) use ($id) {
            return $q->where('id', $id);
        })->first([$attribute]);

        return ! is_null($model) ? $model->{$attribute} : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $attributes = [])
    {
        $model = parent::create($attributes);

        // Create language model if it's exists in this model.
        if (method_exists(get_called_class(), 'createLanguage')) {
            $model->createLanguage($attributes);
        }

        return $model;
    }

    /**
     * Update the model in the database.
     *
     * @param  array   $attributes
     * @param  array   $options
     * @param  string  $exclude
     * @return bool|int
     */
    public function update(array $attributes = [], array $options = [], $exclude = null)
    {
        $this->setFillableByUpdatable($exclude);

        return parent::update($attributes, $options);
    }

    /**
     * Delete the model from the database.
     *
     * @param  int|null  $id
     * @return bool|null
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    public function delete($id = null)
    {
        if (is_null($id)) {
            return parent::delete();
        }

        if (! is_null($model = $this->find($id))) {
            return $model->delete();
        }
    }

    /**
     * Throw new HttpResponseException.
     *
     * @param  \Illuminate\Database\QueryException  $e
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function queryExceptionResponse(QueryException $e)
    {
        $parameters = explode('\'', $e->previous->getMessage());

        $parameters = isset($parameters[1]) ? ['name' => $parameters[1]] : [];

        if (request()->expectsJson()) {
            $response = response()->json(fill_db_data($e->errorInfo[1], $parameters));
        } else {
            $response = redirect()->back()
                ->with('alert', fill_db_data($e->errorInfo[1], $parameters))
                ->withInput();
        }

        throw new HttpResponseException($response);
    }

    /**
     * {@inheritdoc}
     */
    public function __get($key)
    {
        return $this->getAttributeValue($key);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->getAttributeValue($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);
    }
}
