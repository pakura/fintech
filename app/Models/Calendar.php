<?php

namespace Models;

use Models\Abstracts\Model;
use Illuminate\Http\Request;

class Calendar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calendar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'color', 'start', 'end', 'time_start', 'time_end'
    ];

    /**
     * The attributes that are not updatable.
     *
     * @var array
     */
    protected $notUpdatable = [];

    /**
     * The list of the available colors.
     *
     * @var array
     */
    protected $colors = [
        'red', 'blue', 'green', 'orange', 'turquoise', 'purple', 'black', 'gray'
    ];

    /**
     * Get the mutated "start" attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartAttribute($value)
    {
        $value = date('Y-m-d', strtotime($value));

        if (! is_null($this->time_start)) {
            return $value . 'T' . $this->time_start;
        }

        return $value;
    }

    /**
     * Get the mutated "end" attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getEndAttribute($value)
    {
        $value = date('Y-m-d', strtotime($value));

        if (! is_null($this->time_end)) {
            return $value . 'T' . $this->time_end;
        }

        return $value;
    }

    /**
     * Get a random color.
     *
     * @return string
     */
    public function getRandomColor()
    {
        return $this->colors[rand(0, count($this->colors) - 1)];
    }

    /**
     * Get active calendar events.
     *
     * @param  string  $start
     * @param  string  $end
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getActive($start = null, $end = null)
    {
        if (is_null($start)) {
            $start = date('Y-m') . '-01';

            $start = date('Y-m-d', strtotime('-10 days', strtotime($start)));
        }

        if (is_null($end)) {
            $end = date('Y-m-d', strtotime('+50 days', strtotime($start)));
        }

        return $this->whereNotNull('start')
            ->whereBetween('start', [$start, $end])
            ->get();
    }

    /**
     * Get inactive calendar events.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getInactive()
    {
        return $this->whereNull('start')->get();
    }

    /**
     * Update the specified calendar event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool|int
     */
    public function updateEvent(Request $request)
    {
        $input = $request->only(['title', 'description', 'color']);

        if ($request->has('start') || $request->has('end')) {
            $dates = $this->filterDates($request->only(['start', 'end']));

            $input = array_merge($input, $dates);
        }

        return $this->update($input);
    }

    /**
     * Filter event dates.
     *
     * @param  array  $dates
     * @return array
     */
    protected function filterDates(array $dates)
    {
        $dates['time_start'] = $dates['time_end'] = null;
        $start = $dates['start'];
        $end = $dates['end'];

        if ($hasTimeStart = strpos($dates['start'], 'T')) {
            $dates['time_start'] = substr($dates['start'], $hasTimeStart + 1);

            $dates['start'] = substr($dates['start'], 0, $hasTimeStart);
        }

        if ($hasTimeEnd = strpos($dates['end'], 'T')) {
            $dates['time_end'] = substr($dates['end'], $hasTimeEnd + 1);

            if ($start == $end) {
                if ($hasTimeStart) {
                    $dates['time_end'] = date(
                        'H:i:s',
                        strtotime('+1 hour', strtotime($dates['time_start']))
                    );
                }
            }

            $dates['end'] = substr($dates['end'], 0, $hasTimeEnd);
        } else {
            if (is_null($end)) {
                $dates['end'] = $dates['start'];
            }

            if ($hasTimeStart) {
                $dates['time_end'] = date(
                    'H:i:s',
                    strtotime('+1 hour', strtotime($dates['time_start']))
                );
            }
        }

        return $dates;
    }
}
