@extends('layout.layout')

@section('head')
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
@endsection

@section('content')

<!-- Banner Section Start -->
<section id="home-banner" class="banner-style-3 banner-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-xl-7 col-lg-10">
                <div class="banner-content text-center">
                    <span class="subheading">{{ __('home.slider-subheading') }}</span>
                    <h1>{{ __('home.slider-heading') }}</h1>
                    <p>{{ __('home.slider-paragraph') }}</p>

                    <a href="{{ route('programs.index') }}" class="btn btn-main rounded">{{ __('home.slider-button') }}</a>
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
<!-- Banner Section End -->

        <x-home.org-home />
        
        
<section class="category-section section-padding-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-heading mb-70 text-center">
                    <span class="subheading">{{ __('home.categories-subheading') }}</span>
                    <h2 class="font-lg">{{ __('home.categories-heading') }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($brnches as $branch)
            <x-home.branch-item :branch="$branch" />
            @empty
            <div class="row text-center m-3 bg-light border-dark rounded">
                <h3 class="p-5">
                    {{ __('home.no-categories') }}
                </h3>
            </div>
            @endforelse

        </div>
    </div>
</section>

<!--  Course category -->
<!--<section class="category-section section-padding-top">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-xl-8">-->
<!--                <div class="section-heading mb-70 text-center">-->
{{-- <!--                    <span class="subheading">{{ __('home.categories-subheading') }}</span>--> --}}
{{-- <!--                    <h2 class="font-lg">{{ __('home.categories-heading') }}</h2>--> --}}
<!--                </div>-->   
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row">-->
{{-- <!--            @forelse (  $categories as $category)--> --}}
{{-- <!--            <x-home.category-item :category="$category" />--> --}}
<!--            @empty-->
<!--            <div class="row text-center m-3 bg-light border-dark rounded">-->
<!--                <h3 class="p-5">-->
{{-- <!--                    {{ __('home.no-categories') }}--> --}}
<!--                </h3>-->
<!--            </div>-->
<!--            @endforelse-->

<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--  Course category End -->

<!--  Course style 1 -->
<section class="course-wrapper section-padding">
    <section class="bg-light pt-3">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section-heading mb-70 text-center">
                        <h2 class="font-lg">{{ __('home.featured-subheading') }}</h2>
                        <p>{{ __('home.featured-subheading') }}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-lg-center">
                @foreach ($best_selling as $best)
                 <x-program.index.program-grid-item :program="$best" />
                @endforeach
            </div>
        </div>
    </section>
</section>
<!-- Popular Courses End -->

    <x-home.partners-slider />

<!-- Counter Section start -->
<section class="counter-section-2 pb-80 pt-3">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-5 pr-xl-5 col-lg-8">
                <div class="section-heading mb-5 mb-xl-0 text-center text-xl-start">
                    <span class="subheading">{{ config('app.name') }}</span>
                    <h2 class="font-lg">{{ __('home.reasons-heading') }}</h2>
                </div>
            </div>

            <div class="col-xl-7">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="counter-box bg-1 mb-4 mb-lg-0">
                            <i class="flaticon-education"></i>
                            <div class="count">
                                <span class="counter h2">200</span><span>+</span>
                            </div>
                            <p>{{ __('home.reasons-subheading1') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="counter-box bg-2 mb-4 mb-lg-0">
                            <i class="flaticon-infographic"></i>
                            <div class="count">
                                <span class="counter h2">50</span><span>+</span>
                            </div>
                            <p>{{ __('home.reasons-subheading2') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="counter-box bg-3">
                            <i class="flaticon-satisfaction"></i>
                            <div class="count">
                                <span class="counter h2">100</span><span>%</span>
                            </div>
                            <p>{{ __('home.reasons-subheading3') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Section End -->

<!-- InstructorsSection Start -->
<!--<section class="instructors section-padding-btm">-->
<!--    <div class="container">-->
<!--        <div class="row align-items-center">-->
<!--            <div class="col-xl-6 pe-5">-->
<!--                <div class="section-heading">-->
<!--                    <span class="subheading">{{ __('home.top-instructors-subheading') }}</span>-->
<!--                    <h2 class="font-lg mb-20">{{ __('home.top-instructors-heading') }}</h2>-->
<!--                    <p class="mb-30">{{ __('home.top-instructors-paragraph') }}</p>-->

<!--                    <ul class="list-item mb-40">-->
<!--                        <li><i class="fa fa-check"></i>-->
<!--                            <h5>{{ __('home.top-instructors-1') }}</h5>-->
<!--                        </li>-->
<!--                        <li><i class="fa fa-check"></i>-->
<!--                            <h5>{{ __('home.top-instructors-2') }}</h5>-->
<!--                        </li>-->
<!--                        <li><i class="fa fa-check"></i>-->
<!--                            <h5>{{ __('home.top-instructors-3') }}</h5>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <a href="{{ route('programs.index') }}" class="btn btn-main rounded">{{ __('home.top-instructors-button') }}</a>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-xl-6">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-6">-->
<!--                        <div class="team-item team-item-2 mt-5">-->
<!--                            <div class="team-img">-->
<!--                                <img src="{{ asset('assets/images/team/team-4.png') }}" alt="" class="img-fluid">-->

<!--                            </div>-->
<!--                            <div class="team-content">-->
<!--                                <div class="team-info">-->
<!--                                    <h4>Alberto Angelastri</h4>-->
<!--                                    <p>Match Analyst at FC Barcelona Femení.</p>-->
<!--                                </div>-->

<!--                                <div class="course-meta">-->
<!--                                    <span class="duration"><i class="far fa-clock"></i>3+ {{ __('years experience') }}</span>-->
<!--                                    <br>-->
<!--                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>20 Programs</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="team-item team-item-2">-->
<!--                            <div class="team-img">-->
<!--                                <img src="{{ asset('assets/images/team/team-3.jpeg') }}" alt="" class="img-fluid">-->
<!--                            </div>-->
<!--                            <div class="team-content">-->
<!--                                <div class="team-info">-->
<!--                                    <h4>Jordi Pons Bolívar</h4>-->
<!--                                    <p>Football Analyst at FC Barcelona.</p>-->
<!--                                </div>-->
<!--                                <div class="course-meta">-->
<!--                                    <span class="duration"><i class="far fa-clock"></i>5+ years experience</span>-->
<!--                                    <br>-->
<!--                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Programs</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="col-lg-6 col-md-6 col-sm-6">-->
<!--                        <div class="team-item team-item-2">-->
<!--                            <div class="team-img">-->
<!--                                <img src="{{ asset('assets/images/team/team-2.png') }}" alt="" class="img-fluid">-->

<!--                            </div>-->
<!--                            <div class="team-content">-->
<!--                                <div class="team-info">-->
<!--                                    <h4>Joan Vicente Armengol</h4>-->
<!--                                    <p>Analyst of the Under 23 United Arab</p>-->
<!--                                </div>-->
<!--                                <div class="course-meta">-->
<!--                                    <span class="duration"><i class="far fa-clock"></i>5+ years experience</span>-->
<!--                                    <br>-->
<!--                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Programs</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="team-item team-item-2">-->
<!--                            <div class="team-img">-->
<!--                                <img src="{{ asset('assets/images/team/team-1.png') }}" alt="" class="img-fluid">-->

<!--                            </div>-->
<!--                            <div class="team-content">-->
<!--                                <div class="team-info">-->
<!--                                    <h4>Ana Merayo García</h4>-->
<!--                                    <p>Sports Psychologist. Instructor.</p>-->
<!--                                </div>-->

<!--                                <div class="course-meta">-->
<!--                                    <span class="duration"><i class="far fa-clock"></i>5+ years experience</span>-->
<!--                                    <br>-->
<!--                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Programs</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</section>
<!--Instructors Section End -->



<!-- CTA Sidebar start -->
<section class="cta-5 mb--120">
    <div class="container">
        <div class="cta-inner2 ">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6">
                    <div class="cta-content ">
                        <span class="subheading">{{ __('footer.leads-subheading') }}</span>
                        <h3 class="mb-4 mb-xl-0 text-white">{{ __('footer.leads-heading') }}</h3>
                    </div>
                </div>
                <div class="col-xl-6 text-lg-end">
                    <div class="subscribe-form">
                        <form action="#" class="form">
                            <input type="text" class="form-control" placeholder="{{ __('footer.leads-placeholder') }}">
                            <a href="#" class="btn btn-main rounded">{{ __('footer.leads-button') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Sidebar end -->
@endsection

@section('foot')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function () {
    $('.slick-slider').slick({
        rtl:{{ app()->isLocale('ar')?'true':'false' }},
        arrows:false,
        slidesToShow:5,
        autoplay: true,
        autoplaySpeed: 2500,
        infinite:true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
});
</script>
@endsection