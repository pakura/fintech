<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Config\Repository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Mail\Mailer;

class AdminBugReportController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.bug_report.index');
    }

    /**
     * Send a bug report.
     *
     * @param  \Illuminate\Contracts\Mail\Mailer  $mail
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Config\Repository  $config
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Mailer $mail, Request $request, Repository $config)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required'
        ]);

        $data = $request->only(['title', 'description']);

        $host = $request->getHost();

        try {
            $mail->send('admin.bug_report.mail_html', $data,
                function ($m) use ($data, $host, $config) {
                    $m->from($config->get('main.username'))
                        ->to($config->get('cms.bug_mail'))
                        ->subject($host . ' - bug report');
                });

            $message = fill_data('success', trans('mail.message_sent'));
        } catch (Exception $e) {
            $message = fill_data('error', trans('mail.message_not_sent'));
        }

        return redirect(cms_route('bugReport.index'))->with('alert', $message);
    }
}
