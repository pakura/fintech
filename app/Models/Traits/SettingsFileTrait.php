<?php

namespace Models\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait SettingsFileTrait
{
    /**
     * The list of the setting options.
     *
     * @var array
     */
    protected static $settingOptions = [
        'admin_order_by' => [],
        'admin_sort' => [
            'desc' => 'Descending',
            'asc' => 'Ascending'
        ],
        'admin_per_page' => 20,
        'web_order_by' => [],
        'web_sort' => [
            'desc' => 'Descending',
            'asc' => 'Ascending'
        ],
        'web_per_page' => 20
    ];

    /**
     * The list of the default settings.
     *
     * @var array
     */
    protected static $defaultSettings = [
        "admin_order_by" => "id",
        "admin_sort" => "desc",
        "admin_per_page" => 20,
        "web_order_by" => "id",
        "web_sort" => "desc",
        "web_per_page" => 20
    ];

    /**
     * The Collection instance.
     *
     * @var \Illuminate\Support\Collection|null
     */
    private $settings;

    /**
     * Indicates if the setting options are updated.
     *
     * @var bool
     */
    private $settingOptionsUpdated = false;

    /**
     * Get the data based on the admin collection.
     *
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAdminSettings($columns = ['*'])
    {
        return $this->adminSettings()
            ->paginate($this->getSetting('admin_per_page'), $columns);
    }

    /**
     * Get the data based on the public collection.
     *
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPublicSettings($columns = ['*'])
    {
        return $this->publicSettings()
            ->paginate($this->getSetting('web_per_page'), $columns);
    }

    /**
     * Build a query based on the admin collection.
     *
     * @return \Models\Builder\Builder
     */
    public function adminSettings()
    {
        return $this->orderBy(
            $this->getSetting('admin_order_by'),
            $this->getSetting('admin_sort')
        );
    }

    /**
     * Build a query based on the public collection.
     *
     * @return \Models\Builder\Builder
     */
    public function publicSettings()
    {
        return $this->orderBy(
            $this->getSetting('web_order_by'),
            $this->getSetting('web_sort')
        );
    }

    /**
     * Update the setting options.
     *
     * @return array
     */
    protected function updateSettingOptions()
    {
        if ($this->settingOptionsUpdated) {
            return self::$settingOptions;
        }

        $options = self::$settingOptions;

        if (in_array(PositionableTrait::class, class_uses_recursive($this))) {
            $values = ['position' => 'Position'];

            $options['admin_order_by'] += $values;
            $options['web_order_by'] += $values;
        }

        if ($this->timestamps) {
            $values = ['created_at' => 'Creation date'];

            $options['admin_order_by'] += $values;
            $options['web_order_by'] += $values;
        }

        $options += (array) $this->addSettingOptions();

        $this->settingOptionsUpdated = true;

        return $options;
    }

    /**
     * Add a new setting options.
     *
     * @return array
     */
    protected function addSettingOptions()
    {
        return [];
    }

    /**
     * Get the setting options.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSettingOptions()
    {
        return new Collection($this->updateSettingOptions());
    }

    /**
     * Get the specified setting.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function getSetting($key, $default = null)
    {
        $options = self::$defaultSettings + (array) $this->addSettingOptions();

        $default = isset($options[$key]) ? $options[$key] : $default;

        return $this->getSettings()->get($key, $default);
    }

    /**
     * Get the settings.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSettings()
    {
        if ($this->settings instanceof Collection) {
            return $this->settings;
        }

        $name = strtolower(class_basename($this));

        $settings = new Collection;

        try {
            $settings = $settings->make(
                json_decode((new Filesystem)->get(resource_path("models/{$name}.json")))
            );
        } catch (FileNotFoundException $exception) {}

        if (! $settings->isEmpty()) {
            return $this->settings = $settings;
        }

        return $this->settings = $settings->make(self::$defaultSettings);
    }

    /**
     * Set the settings.
     *
     * @param  \Illuminate\Http\Request $request
     * @return int
     */
    public function setSettings(Request $request)
    {
        $this->settings = null;

        $name = strtolower(class_basename($this));

        $content = json_encode($request->only(array_keys(
            $this->getSettingOptions()->toArray()))
        );

        return (new Filesystem)->put(resource_path("models/{$name}.json"), $content);
    }
}
