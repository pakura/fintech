<?php

namespace Models\Builder;

use Closure;
use ReflectionMethod;
use Models\Abstracts\Model;
use InvalidArgumentException;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Builder extends EloquentBuilder
{
    /**
     * The Model instance.
     *
     * @var \Models\Abstracts\Model
     */
    protected $model;

    /**
     * The columns that should be added to the paginate count query.
     *
     * @var array
     */
    public $columnsPaginate = [];

    /**
     * Create a new Eloquent query builder instance.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  \Models\Abstracts\Model  $model
     * @return void
     */
    public function __construct(QueryBuilder $query, Model $model)
    {
        parent::__construct($query);

        $this->model = $model;
    }

    /**
     * Add a select exists statement to the query.
     *
     * @param  \Closure|\Illuminate\Database\Query\Builder|string $query
     * @param  string  $as
     * @param  bool  $not
     * @return \Illuminate\Database\Query\Builder|static
     *
     * @throws \InvalidArgumentException
     */
    public function selectExists($query, $as, $not = false)
    {
        if ($query instanceof Closure) {
            $callback = $query;

            $callback($query = $this->query->newQuery());
        }

        if ($query instanceof QueryBuilder) {
            $bindings = $query->getBindings();

            $query = $query->toSql();
        } elseif (is_string($query)) {
            $bindings = [];
        } else {
            throw new InvalidArgumentException;
        }

        $not = $not ? 'not ' : '';

        return $this->selectRaw(
            '(select '.$not.'exists('.$query.')) as '.$this->query->getGrammar()->wrap($as),
            $bindings
        );
    }

    /**
     * Add a select not exists statement to the query.
     *
     * @param  \Closure|\Illuminate\Database\Query\Builder|string $query
     * @param  string  $as
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function selectNotExists($query, $as)
    {
        return $this->selectExists($query, $as, true);
    }

    /**
     * Add a new select to the paginate count query.
     *
     * @param  string  $expression
     * @param  string  $method
     * @param  string  $parameter
     * @return \Models\Builder\Builder
     */
    public function selectPaginate($expression, $method = 'selectRaw', $parameter = null)
    {
        if (! isset($this->columnsPaginate[$method])) {
            $this->columnsPaginate[$method] = [];
        }

        $this->columnsPaginate[$method] = array_merge(
            $this->columnsPaginate[$method], $parameter
            ? [$parameter => $expression]
            : [$expression]
        );

        return call_user_func_array([$this, $method], array_filter([$expression, $parameter]));
    }


    /**
     * {@inheritdoc}
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->prefixColumnsOnJoin($columns);

        if (! $this->columnsPaginate) {
            return parent::paginate($perPage, $columns, $pageName, $page);
        }

        $columnsBackup = $this->query->columns;
        $this->query->columns = null;

        $selectBindingsBackup = $this->query->bindings['select'];
        $this->query->bindings['select'] = [];

        $query = $this->query->selectRaw('count(*) as aggregate');

        foreach ((array) $this->columnsPaginate as $method => $selects) {
            foreach ((array) $selects as $parameter => $select) {
                if (is_int($parameter)) {
                    $query = $query->{$method}($select);
                } else {
                    $query = $query->{$method}($select, $parameter);
                }
            }
        }

        $results = $query->get()->all();

        if (isset($this->query->groups)) {
            $total = count($results);
        } elseif (! isset($results[0])) {
            $total = 0;
        } elseif (is_object($item = $results[0])) {
            $total = (int) $item->aggregate;
        } else {
            $total = (int) array_change_key_case((array) $item)['aggregate'];
        }

        $this->query->columns = $columnsBackup;
        $this->query->bindings['select'] = $selectBindingsBackup;

        if ($total) {
            $results = $this->forPage(
                $page = $page ?: Paginator::resolveCurrentPage($pageName),
                $perPage = $perPage ?: $this->model->getPerPage()
            )->get($columns);
        } else {
            $results = $this->model->newCollection();
        }

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($columns = ['*'])
    {
        $this->prefixColumnsOnJoin($columns);

        return parent::get($columns);
    }

    /**
     * Execute the query as a "select" statement or throw an exception.
     *
     * @param  array  $columns
     * @return \Illuminate\Support\Collection
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getOrFail($columns = ['*'])
    {
        $collection = $this->get($columns);

        $collection->isEmpty() and abort(404);

        return $collection;
    }

    /**
     * Update the model in the database.
     *
     * @param  array   $attributes
     * @param  string  $exclude
     * @return int
     */
    public function update(array $attributes = [], $exclude = null)
    {
        $this->model->setFillableByUpdatable($exclude);

        return parent::update($attributes);
    }

    /**
     * Prefix columns with the model table name if join clause is set.
     *
     * @param  array  $columns
     * @return void
     */
    protected function prefixColumnsOnJoin($columns = ['*'])
    {
        if (! isset($this->query->joins)) {
            return;
        }

        if (isset($columns[0]) && $columns[0] != '*') {
            $this->query->columns = (array) $columns;
        }

        $bindings = ['column'] + array_keys($this->query->getRawBindings());

        foreach ($bindings as $i => $binding) {
            if (! is_array($binding = $this->query->{str_plural($binding)})) {
                continue;
            }

            foreach ($binding as $bind => $value) {
                if ($value instanceof JoinClause) {
                    $wheres = $value->wheres;

                    foreach ($wheres as $key => $clause) {
                        if (! empty($clause['nested'])) {
                            continue;
                        }

                        if (empty($clause['operator'])) {
                            $value->wheres[$key]['operator'] = "=";
                        }

                        if (isset($value->wheres[$key]['first'])
                            && strpos($first = $value->wheres[$key]['first'], '.') === false
                        ) {
                            $value->wheres[$key]['first'] = "{$this->query->from}.{$first}";
                        }

                        if (($secondExists = ! empty($value->wheres[$key]['second']))
                            && is_string($second = $value->wheres[$key]['second'])
                            && strpos($second, '.') === false
                        ) {
                            $value->wheres[$key]['second'] = "{$value->table}.{$second}";
                        } elseif (! $secondExists) {
                            $value->wheres[$key]['second'] = "{$value->table}.id";
                        }
                    }
                } elseif (is_string($value) && $value == 'id') {
                    $this->query->{str_plural($bindings[$i])}[$bind] = $this->query->from . '.' . $value;
                } elseif (is_array($value)
                    && isset($value['column'])
                    && strpos($value['column'], '.') === false
                ) {
                    $columns = array_merge(
                        (array) array_values($this->model->getFillable()),
                        (array) array_values($this->model->getDates())
                    );

                    if ($value['column'] == 'id' || in_array($value['column'], $columns)) {
                        $table = $this->query->from . '.';

                        $this->query->{str_plural($bindings[$i])}[$bind]['column'] = $table . $value['column'];
                    }
                }
            }
        }
    }

    /**
     * Add an "order by" primary key asc clause to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function orderAsc()
    {
        return $this->orderBy($this->getKeyName());
    }

    /**
     * Add an "order by" primary key desc clause to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function orderDesc()
    {
        return $this->orderByDesc($this->getKeyName());
    }

    /**
     * Add an "order by" created at asc clause to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function createdAsc()
    {
        return $this->orderBy('created_at');
    }

    /**
     * Add an "order by" created at desc clause to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function createdDesc()
    {
        return $this->orderByDesc('created_at');
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->query->{$key};
    }

    /**
     * {@inheritdoc}
     */
    public function __call($method, $parameters)
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 5);

        $possibleLoop = in_array($method, [
            $backtrace[2]['function'], $backtrace[3]['function'], $backtrace[4]['function']
        ]);

        if (! $possibleLoop
            && method_exists($this->model, $method)
            && (new ReflectionMethod($this->model, $method))->isPublic()
        ) {
            $this->model->setEloquentBuilder($this);

            return call_user_func_array([$this->model, $method], $parameters);
        }

        $result = call_user_func_array([$this->query, $method], $parameters);

        return in_array($method, $this->passthru) ? $result : $this;
    }
}
