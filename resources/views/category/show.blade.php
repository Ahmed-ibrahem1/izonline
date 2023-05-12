@extends('layout.layout')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-8">
                <div class="title-block">
                    <h1>{{ $category->title }}</h1>
                    <ul class="header-bradcrumb justify-content-center" dir="ltr">
                        <li><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                        <li>{{ __('show-category.category') }}</li>
                        <li class="active" aria-current="page">{{ $category->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding page">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center tas">
                <div class="col-lg-8">
                    <p>{{ __('index-program.showing') }} {{ $programs->firstItem() }} - {{ $programs->lastItem() }} {{ __('index-program.of') }} {{ $programs->total() }} {{ __('index-program.results') }}</p>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-lg-center">
            @forelse ($programs as $program)
            <x-program.index.program-grid-item :program="$program" />
            @empty
            <div class="row text-center m-3 bg-light border-dark rounded">
                <h3 class="p-5">
                    {{ __('show-category.no-results') }}
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