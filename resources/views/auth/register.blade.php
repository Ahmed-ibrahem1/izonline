@extends('layout.layout')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-7 card p-5 shadow rounded-3">

                <div class="text-center">
                    <h2 class="font-weight-bold mb-3">{{ __('login.sign-up') }}</h2>
                    <p>
                        {{ __('register.login') }} <a href="{{ route('login') }}" class="text-decoration-underline">{{ __('header.login') }}</a>
                    </p>
                </div>

                <form method="post" action="{{ route('user.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-xl-6">
                            <x-forms.input type="text" name="first_name" :label="__('validation-attributes.attributes.first_name')" required=true :value="old('first_name')" />
                        </div>
                        <div class="col-xl-6">
                            <x-forms.input type="text" name="middle_name" :label="__('validation-attributes.attributes.middle_name')" required=true :value="old('middle_name')" />
                        </div>
                        <div class=" col-xl-6">
                            <x-forms.input type="text" name="last_name" :label="__('validation-attributes.attributes.last_name')" required=true :value="old('last_name')" />
                        </div>

                        <div class="col-xl-6">
                            <x-forms.input type="text" name="username" :label="__('validation-attributes.attributes.username')" required=true :value="old('username')" />
                        </div>

                        <div class="col-xl-6">
                            <x-forms.input type="email" name="email" :label="__('validation-attributes.attributes.email')" required=true :value="old('email')" />
                        </div>

                        <div class="col-xl-6">
                            <x-forms.input inputClass="form-control phone-input" type="tel" name="phone_number" :label="__('register.phone_number')" required=true :value="old('phone_number')" />
                        </div>

                        <div class="col-xl-6">
                            <x-forms.input type="password" name="password" :label="__('validation-attributes.attributes.password')" required=true />
                        </div>

                        <div class="col-xl-6">
                            <x-forms.input type="password" name="password_confirmation" :label="__('validation-attributes.attributes.password_confirmation')" required=true />
                        </div>

                        <div class="col-xl-12">
                            <div class="d-flex align-items-center justify-content-between py-2">
                                <p>
                                    <a href="{{ route('forgot-password.create') }}">{{ __('login.forgot-password') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <p>
                        <input type="submit" class="btn btn-primary rounded-3 w-100 hover-shadow" value={{ __('register.register') }} />
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
<script src="{{ asset('assets/js/intlTelInput-jquery.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $(".phone-input").intlTelInput({
            nationalMode: false,
            separateDialCode: false,
            autoHideDialCode:false,
            formatOnDisplay:false,
            preferredCountries: ['eg'],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
    });
</script>
@endsection