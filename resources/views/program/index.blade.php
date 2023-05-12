@extends('layout.layout')

@section('content')

<x-pages.hero-title :title="__('index-program.programs')" />

<section class="section-padding page">
    <div class="course-top-wrap">
        <div class="container">
            <x-program.index.filter />
        </div>
    </div>

    <div class="container">
        <div class="tas">
            <p>{{ __('index-program.showing') }} {{ $programs->firstItem() }} - {{ $programs->lastItem() }} {{ __('index-program.of') }} {{ $programs->total() }} {{ __('index-program.results') }}</p>
        </div>
        <div class="row justify-content-lg-center">
            @forelse ($programs as $program)
            <x-program.index.program-grid-item :program="$program" />
            @empty
            <div class="row text-center m-3 bg-light border-dark rounded">
                <h3 class="p-5">
                    {{ __('index-program.no-results') }}
                </h3>
            </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $programs->links() }}
    </div>
    <!--course-->
</section>
<!--course section end-->

@endsection