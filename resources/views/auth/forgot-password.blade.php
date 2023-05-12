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

                    @if (session('status'))
                    <div class="w-100 bg-success p-2 rounded my-2">
                        <div class="tas">
                            <h6 class="text-white text-sm">{{ session('status') }}</h6>
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('forgot-password.store') }}">
                        @csrf
                        <x-forms.input class="my-3"
                                       type="email"
                                       name="email"
                                       :placeholder="__('login.email')"
                                       :label="__('forgot-password.enter-email')"
                                       required=true />

                        <input type="submit" class="btn mt-3 btn-primary hover-shadow rounded-3 w-100" value="{{ __('forgot-password.reset') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection