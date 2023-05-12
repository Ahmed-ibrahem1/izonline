@extends('layout.layout')

@section('content')
@if (auth()->user()->hasVerifiedEmail())
<div class="card col-xl-8 m-auto mt-5 mb-5 tas">
    <h5 class="card-header p-3">{{ __('verify-email.verified-heading') }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ __('verify-email.verified-title') }}</h5>
        <p class="card-text">{{ __('verify-email.verified-paragraph') }}</p>
    </div>
</div>
@else
<div class="card col-xl-8 m-auto mt-5 mb-5 tas">
    <h5 class="card-header p-3">{{ __('verify-email.heading') }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ __('verify-email.title') }}</h5>
        <p class="card-text">{{ __('verify-email.paragraph') }}</p>
        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <input type="submit" class="btn btn-primary rounded bg-primary" value="{{ __('verify-email.button') }}" />
        </form>
    </div>
</div>
@endif
@endsection