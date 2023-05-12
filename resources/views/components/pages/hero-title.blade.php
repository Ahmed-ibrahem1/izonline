@props(['title'])

<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-8">
                <div class="title-block">
                    <h1>{{ $title }}</h1>
                    <ul class="header-bradcrumb justify-content-center" dir="ltr">
                        <li><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                        <li class="active" aria-current="page">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>