<?php

namespace App\Http\Controllers\Admin;

use Models\Note;
use Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminNotesController extends Controller
{
    /**
     * The Note instance.
     *
     * @var \Models\Note
     */
    protected $model;

    /**
     * The Request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Note  $model
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Note $model, Request $request)
    {
        $this->model = $model;

        $this->request = $request;
    }

    /**
     * Display a listing of the .
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['items'] = $this->model->orderDesc()->get();

        return view('admin.notes.index', $data);
    }

    /**
     * insert/update on the .
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $input = $this->request->only(['title', 'description', 'content']);

        if ($this->request->has('id')) {
            $id = $this->request->get('id');

            $this->model->findOrFail($id)->update($input);
        } else {
            $this->model = $this->model->create($input);
        }

        if ($this->request->expectsJson()) {
            return response()->json($this->model->id);
        }

        return redirect()->back();
    }

    /**
     * Move note into the calendar.
     *
     * @param  \Models\Calendar  $calendar
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function calendar(Calendar $calendar)
    {
        $input['title'] = $this->request->get('title');

        $content = explode(PHP_EOL, $this->request->get('content'));

        if (count($content) > 1) {
            array_shift($content);

            $input['description'] = implode(PHP_EOL, $content);
        }

        $input['color'] = $calendar->getRandomColor();

        $model = $calendar->create($input);

        if ($this->request->expectsJson()) {
            return response()->json($model);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified .
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        $id = $this->request->get('id');

        $model = $this->model->delete($id);

        if ($this->request->expectsJson()) {
            return response()->json($model);
        }

        return redirect()->back();
    }
}
