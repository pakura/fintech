<?php

namespace App\Listeners\Admin;

class AdminUserPanelEventListener
{
    /**
     * Handle view composer data.
     *
     * @param  \Illuminate\Contracts\View\View  $event
     * @return void
     */
    public function onUserPanelComposer($event)
    {
        $event->sitemapXmlTime = null;

        if (file_exists($file = public_path('sitemap.xml'))) {
            $event->sitemapXmlTime = filectime($file);
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen([
                'composing: admin._partials.user',
            ],
            'App\Listeners\Admin\AdminUserPanelEventListener@onUserPanelComposer'
        );
    }
}
