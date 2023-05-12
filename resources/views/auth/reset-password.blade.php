@extends('layout.layout')

@section('content')
<section class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5">
                <div class="card p-5 shadow">
                    <div class="text-center">
                        <h2 class="font-weight-bold mb-3">{{ __('forgot-password.reset-password') }}</h2>
                    </div>
                    <form method="POST" action="{{ route('reset-password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <x-forms.input class="my-3"
                                       type="email"
                                       name="email"
                                       :label="__('login.email')"
                                       required=true />

                        <x-forms.input class="my-3"
                                       type="password"
                                       name="password"
                                       :label="__('reset-password.new-password')"
                                       required=true />

                        <x-forms.input class="my-3"
                                       type="password"
                                       name="password_confirmation"
                                       :label="__('reset-password.new-password-confirmation')"
                                       required=true />

                        <input type="submit" class="btn mt-3 btn-primary hover-shadow rounded-3 w-100" value="{{ __('forgot-password.reset') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection