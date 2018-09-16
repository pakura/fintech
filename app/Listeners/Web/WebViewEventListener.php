<?php

namespace App\Listeners\Web;

class WebViewEventListener
{
    /**
     * Handle view composer events.
     *
     * @param  \Illuminate\Contracts\View\View  $event
     * @return void
     */
    public function onViewComposer($event)
    {
        //
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            'composing: web.app',
            'App\Listeners\Web\WebViewEventListener@onViewComposer'
        );
    }
}