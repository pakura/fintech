<?php

namespace App\Support\Admin;

use Models\File;
use Models\Abstracts\Model;
use Illuminate\Filesystem\Filesystem;

class AdminDestroy
{
    /**
     * The Model instance.
     *
     * @var object
     */
    protected $model;

    /**
     * The id of the Model.
     *
     * @var int
     */
    protected $id;

    /**
     * Indicates if the model has an attached files.
     *
     * @return bool
     */
    protected $hasFiles;

    /**
     * Recursively deletable directories.
     *
     * @var string
     */
    protected $deleteDirs;

    /**
     * Create a new job instance.
     *
     * @param  \Models\Abstracts\Model  $model
     * @param  int  $id
     * @param  bool  $hasFiles
     * @param  null|string  $deleteDirs
     * @return void
     */
    public function __construct($model, $id, $hasFiles = true, $deleteDirs = null)
    {
        $this->model = $model;

        $this->id = $id;

        $this->hasFiles = $hasFiles;

        $this->deleteDirs = $deleteDirs;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        if (! $this->isDeletable() || ! $this->performDelete()) {
            return $this->response('error', trans('database.error.1451'));
        }

        if (! is_null($this->deleteDirs)) {
            $filesystem = new Filesystem;

            foreach ((array) $this->deleteDirs as $dir) {
                $filesystem->deleteDirectory($dir);
            }
        }

        return $this->response('success', trans('database.deleted'));
    }

    /**
     * Determine if this Model is  deletable.
     *
     * @return bool
     */
    protected function isDeletable()
    {
        if (! $this->model instanceof Model) {
            return false;
        }

        return true;
    }

    /**
     * Perform the delete query on this Model instance.
     *
     * @return bool
     */
    protected function performDelete()
    {
        if ($this->hasFiles) {
            (new File)->byForeign($this->model->getTable(), $this->id)->delete();
        }

        if (is_array($this->id)) {
            return (bool) $this->model->destroy($this->id);
        }

        return (bool) $this->model->findOrFail($this->id)->delete();
    }

    /**
     * Check request type and return appropriate response
     *
     * @param  string  $type
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function response($type, $message)
    {
        if (request()->expectsJson()) {
            return response()->json(fill_data($type, $message));
        }

        return redirect()->back()->with('alert', fill_data($type, $message));
    }
}
