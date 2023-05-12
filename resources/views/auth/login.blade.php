@extends('layout.layout')

@section('content')
<section class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5">
                <div class="card p-5 shadow">
                    <div class="text-center">
                        <h2 class="font-weight-bold mb-3">{{ __('login.login') }}</h2>

                        <p>
                            {{ __('login.no-account?') }} <a href="{{ route('user.create') }}" class="text-decoration-underline">{{ __('login.sign-up') }}</a>
                        </p>
                    </div>
                    <form method="POST" action="{{ route('session.store') }}">
                        @csrf
                        <x-forms.input type="email" name="email" :label="__('validation-attributes.attributes.email')" required=true />

                        <x-forms.input type="password" name="password" :label="__('validation-attributes.attributes.password')" required=true />

                        <div class="d-flex align-items-center justify-content-between py-2">
                            <p>
                                <label>
                                    <input name="remember-me" type="checkbox" value=1> <span>{{ __('login.remember') }}</span>
                                </label>
                            </p>

                            <p>
                                <a href="{{ route('forgot-password.create') }}">{{ __('login.forgot-password') }}</a>
                            </p>
                        </div>

                        <p>
                            <input type="submit" class="btn btn-primary hover-shadow rounded-3 w-100" value="{{ __('header.login') }}" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shop category end-->
@endsection