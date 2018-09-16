<?php

namespace App\Http\Controllers\Admin;

use Models\Abstracts\Model;
use Illuminate\Http\Request;

trait MovableTrait
{
    /**
     * Move item to the specified direction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function move(Request $request, $id)
    {
        $input = $request->only(['id', 'column', 'column_value', 'recursive']);

        if (! $this->model instanceof Model) {
            return $this->getMovableResponse($request, 'error', 'Model not found');
        }

        if ($id != $input['column_value']) {
            app('db')->transaction(function () use ($input) {
                $model = $this->model->findOrFail($input['id']);

                $position = $this->model->where($input['column'], $input['column_value'])->max('position');

                $attributes = [$input['column'] => $input['column_value'], 'position' => $position + 1];

                if ($recursive = ! empty($input['recursive'])) {
                    $attributes['parent_id'] = 0;
                }

                $model->update($attributes);

                if ($recursive) {
                    $this->updateMenu($model, $input['column'], $input['column_value']);
                }
            });
        }

        return $this->getMovableResponse($request, 'success', trans('general.updated'));
    }

    /**
     * Move item recursively with its child item(s).
     *
     * @param  \Models\Abstracts\Model  $model
     * @param  string  $column
     * @param  int     $columnValue
     * @return void
     */
    protected function updateMenu(Model $model, $column, $columnValue)
    {
        $items = $this->model->where('parent_id', $model->id)->get();

        if (! $items->isEmpty()) {
            foreach ($items as $item) {
                $item->update([$column => $columnValue]);

                $this->updateMenu($item, $column, $columnValue);
            }
        }
    }

    /**
     * Get the movable response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type
     * @param  string|null  $message
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function getMovableResponse(Request $request, $type, $message = null)
    {
        if ($request->expectsJson()) {
            return response()->json(fill_data(
                $type, $message
            ));
        }

        return redirect()->back()->with('alert', fill_data($type, $message));
    }
}
