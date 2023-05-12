<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
            // TODO: implement remember-me in validation request
        ]);

        // validate credentials
        if (auth()->attempt($credentials, isset($credentials['remember-me']) && $credentials['remember-me'] === 1)) {
            // regenerate session for security and redirect to intended page
            $request->session()->regenerate();
            return redirect()->intended()->with(['flash' => 'success', 'message' => trans('home.signed-in')]);
        }

        // return with error on credential validation erors
        return back()->withErrors(['email' => trans('auth.failed')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // log user out and redirect
        auth()->logout();
        return redirect()->back()->with([
            'flash' => 'success',
            'message' => trans('home.logged-out'),
        ]);
    }
}
