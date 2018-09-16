<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as Controller;

class AdminLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cms.guest')->except(['logout', 'setLockscreen']);
    }

    /**
     * {@inheritdoc}
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * {@inheritdoc}
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(cms_route('login'));
    }

    /**
     * {@inheritdoc}
     */
    protected function guard()
    {
        return Auth::guard('cms');
    }

    /**
     * {@inheritdoc}
     */
    public function redirectPath()
    {
        return cms_url($this->redirectTo);
    }

    /**
     * Get the lockscreen response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLockscreen(Request $request)
    {
        $request->session()->flash('includeLockscreen', 1);

        return view('admin.app');
    }

    /**
     * Set the lockscreen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setLockscreen(Request $request)
    {
        $this->guard()->user()->lockScreen();

        if ($request->expectsJson()) {
            return response()->json([
                'result' => true, 'view' => view('admin.lockscreen')->render()
            ]);
        }

        return redirect(cms_route('dashboard'));
    }

    /**
     * Handle a lockscreen request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function postLockscreen(Request $request)
    {
        $isValid = false;

        if ($request->has('password')) {
            $isValid = $this->guard()->getProvider()->validateCredentials(
                $this->guard()->user(),
                $request->only('password')
            );
        }

        if ($isValid) {
            $this->guard()->user()->unlockScreen();

            if ($request->expectsJson()) {
                return response()->json(fill_data(true));
            }

            return redirect()->intended(cms_route('dashboard'));
        }

        if ($request->expectsJson()) {
            return response()->json(fill_data(false, trans('auth.invalid.password')));
        }

        return redirect()->back()->withErrors(trans('auth.invalid.password'));
    }
}
