<?php

namespace App\Http\Controllers\Admin;

use RuntimeException;
use Models\Abstracts\Model;
use Illuminate\Http\Request;

trait VisibilityTrait
{
    /**
     * Update visibility of the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \RuntimeException
     */
    public function visibility(Request $request, $id)
    {
        if (! isset($this->model) || ! $this->model instanceof Model) {
            throw new RuntimeException('Model not found');
        }

        if ($this->model->hasLanguage()) {
            $model = $this->model->joinLanguage()->findOrFail($id);
        } else {
            $model = $this->model->findOrFail($id);
        }

        if ($model->visible) {
            $model->update(['visible' => $visible = 0]);
        } else {
            $model->update(['visible' => $visible = 1]);
        }

        if ($request->expectsJson()) {
            return response()->json($visible);
        }

        return redirect()->back();
    }
}
