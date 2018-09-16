<?php

namespace Models;

use Exception;
use Models\Abstracts\Model;
use InvalidArgumentException;
use Models\Traits\LanguageTrait;
use Models\Traits\PositionableTrait;
use Illuminate\Filesystem\Filesystem;

class File extends Model
{
    use LanguageTrait, PositionableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table_name', 'table_id', 'position', 'visible'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [
        'table_name', 'table_id'
    ];

    /**
     * Related database table name used by the Language model.
     *
     * @var string
     */
    protected $languageTable = 'file_languages';

    /**
     * The attributes that are mass assignable for the Language model.
     *
     * @var array
     */
    protected $languageFillable = [
        'file_id', 'language', 'title', 'file'
    ];

    /**
     * The attributes that are not updatable for the Language model.
     *
     * @var array
     */
    protected $languageNotUpdatable = [
        'file_id', 'language'
    ];

    /**
     * Get the mutated file default attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getFileDefaultAttribute($value)
    {
        return $value ?: asset('assets/images/album-img-1.png');
    }

    /**
     * The foreign eloquent model instance.
     *
     * @var \Models\Abstracts\Model
     */
    protected $foreignModel;

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @param  string|null  $routeName
     * @param  int|null  $routeId
     * @return void
     */
    public function __construct(array $attributes = [], $routeName = null, $routeId = null)
    {
        parent::__construct($attributes);

        if (! is_null($route = request()->route())) {
            $this->setForeign(
                $route->parameter('routeName'),
                $route->parameter('routeId')
            );
        } else {
            $this->setForeign($routeName, $routeId);
        }
    }

    /**
     * Set the foreign Eloquent model instance.
     *
     * @param  string|null  $routeName
     * @param  int|null  $routeId
     * @return void
     */
    public function setForeign($routeName = null, $routeId = null)
    {
        if (! is_null($this->foreignModel) || is_null($routeName) || is_null($routeId)) {
            return;
        }

        $foreignRoute = (array) cms_files($routeName);

        if (! isset($foreignRoute['model'])) {
            throw new InvalidArgumentException('Model not provided.');
        }

        $this->foreignModel = new $foreignRoute['model'];

        $this->foreignModel = $this->foreignModel
            ->when($this->foreignModel->hasLanguage(), function ($q) {
                return $q->joinLanguage();
            })->findOrFail($routeId);

        if (isset($foreignRoute['foreign_key'])) {
            $routeParams[] = $this->foreignModel->{$foreignRoute['foreign_key']};
        }

        $routeParams[] = $this->foreignModel->id;

        $this->foreignModel['routeParams'] = $routeParams;

        $this->setAttribute('table_name', $this->foreignModel->getTable());

        $this->setAttribute('table_id', $this->foreignModel->id);
    }

    /**
     * Get the foreign Eloquent model instance.
     *
     * @return  \Models\Abstracts\Model
     */
    public function getForeignModel()
    {
        return $this->foreignModel;
    }

    /**
     * Get the data based on the foreign model
     *
     * @param  string|null  $tableName
     * @param  int|null  $tableId
     * @param  int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByForeign($tableName = null, $tableId = null, $perPage = 20)
    {
        return $this->joinLanguage()
            ->byForeign($tableName, $tableId)
            ->orderBy('position', 'desc')
            ->paginate($perPage);
    }

    /**
     * Build a query by the foreign model.
     *
     * @param  string|null  $tableName
     * @param  int|null  $tableId
     * @return \Models\Builder\Builder
     */
    public function byForeign($tableName = null, $tableId = null)
    {
        return $this->where('table_name', $tableName ?: $this->table_name)
            ->where('table_id', $tableId ?: $this->table_id);
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
     * {@inheritdoc}
     */
    public function create(array $attributes = [])
    {
        $attributes['position'] = (int) $this->byForeign()->max('position') + 1;

        return parent::create($attributes);
    }

    /**
     * Get the file size.
     *
     * @param  string|null $file
     * @return string
     */
    public function getFileSize($file = null)
    {
        try {
            $size = (new Filesystem)->size(
                base_path(trim(parse_url($file ?: $this->file, PHP_URL_PATH), '/'))
            );
        } catch (Exception $e) {
            $size = 0;
        }

        return format_bytes($size);
    }
}
