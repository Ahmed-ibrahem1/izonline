<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('phone_number')) {
            $request['phone_number'] = str_replace(' ', '', $request['phone_number']);
        }

        // Validate Fields
        $fields = $request->validate([
            'username' => ['required', 'alpha_dash', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            'first_name' => ['required', 'max:255'],
            'middle_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)],
            'phone_number' => ['required', new PhoneNumber],
        ]);

        // Create User
        $user = User::create($fields);

        // Notify Registered Listener for email
        event(new Registered($user));

        // sign user in
        auth()->login($user);

        // redirect to verify email page
        return redirect()->route('verification.notice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = (object)auth()->user();

        $fields = $request->validate([
            'password' => ['sometimes', 'confirmed', Password::min(8)->letters()->numbers()],
            'phone_number' => ['required', new PhoneNumber],
            'middle_name' => ['required', 'max:255'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
        ]);

        $user->update($fields);

        return redirect()->route('user.my-account')->with([
            'flash' => 'success',
            'message' => trans('user-edit.edit-successful')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function dashboard()
    {
        return view('user.dashboard', [
            'courses' => auth()->user()->sales,
        ]);
    }

    public function createForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function storeForgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $status = FacadesPassword::sendResetLink(
            $request->only('email')
        );

        return $status === FacadesPassword::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function createResetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function storeResetPassword(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $status = FacadesPassword::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === FacadesPassword::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
