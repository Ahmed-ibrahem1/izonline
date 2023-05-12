@extends('layout.layout')
@section('content')

<div class="container py-5 col-lg-6">
    <div class="card rounded-3 tas shadow">
        <div class="card-header">
            <h1 class="py-2">
                {{ __('user-edit.edit-account') }}
            </h1>
        </div>
        <div class="card-body">
            <form id="update-user" action="{{ route('user.update') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="text" name="username" :label="__('validation-attributes.attributes.username')" required=true :value="$user->username" disabled />
                    </div>
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="text" name="email" :label="__('validation-attributes.attributes.email')" required=true :value="$user->email" disabled />
                    </div>
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="text" name="first_name" :label="__('validation-attributes.attributes.first_name')" required=true :value="$user->first_name" />
                    </div>
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="text" name="middle_name" :label="__('validation-attributes.attributes.middle_name')" required=true :value="$user->middle_name" />
                    </div>
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="text" name="last_name" :label="__('validation-attributes.attributes.last_name')" required=true :value="$user->last_name" />
                    </div>
                    <div class="col-xl-6 py-2">
                        <x-forms.input type="text" name="phone_number" :label="__('register.phone_number')" required=true :value="$user->phone_number" />
                    </div>
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="password" name="password" :label="__('validation-attributes.attributes.password')" autocomplete="off" />
                    </div>
                    <div class="col-lg-6 py-2">
                        <x-forms.input type="password" name="password_confirmation" :label="__('validation-attributes.attributes.password_confirmation')" />
                    </div>
                </div>

                <div class="d-flex justify-content-end pt-3">
                    <input class="btn btn-sm btn-warning rounded-3 me-2" type="reset" value="{{ __('user-edit.reset') }}">
                    <input class="btn btn-sm btn-success rounded-3 " type="submit" value="{{ __('user-edit.update') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('foot')
<script>
    $('form#update-user').submit(function() {
        $(':input', this).each(function() {
            this.disabled = !($(this).val());
        });
    });
</script>
@endsection