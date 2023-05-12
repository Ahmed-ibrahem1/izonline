@extends('layout.layout')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-8" dir="ltr">
                    <div class="title-block">
                        <h1>{{ __('header.about') }}</h1>
                        <ul class="header-bradcrumb justify-content-center">
                            <li><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                            <li class="active" aria-current="page">{{ __('header.about') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section Start -->
    <section class="about-3 section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-between tas">
                <div class="col-xl-5 col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('assets/images/logos/logo-dark.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content mt-5 mt-lg-0">
                        <div class="heading mb-50">
                            <span class="subheading">{{ __('about-us.subheading') }}</span>
                            <h2 class="font-lg">{{ __('about-us.heading') }}</h2>
                        </div>

                        <div class="about-features">
                            <div class="feature-item feature-style-left">
                                <div class="feature-icon icon-bg-3 icon-radius">
                                    <i class="fa fa-video"></i>
                                </div>
                                <div class="feature-text">
                                    <h4>{{ __('about-us.f1h') }}</h4>
                                    <p>{{ __('about-us.f1p') }}</p>
                                </div>
                            </div>

                            <div class="feature-item feature-style-left">
                                <div class="feature-icon icon-bg-2 icon-radius">
                                    <i class="far fa-file-certificate"></i>
                                </div>
                                <div class="feature-text">
                                    <h4>{{ __('about-us.f2h') }}</h4>
                                    <p>{{ __('about-us.f2p') }}</p>
                                </div>
                            </div>

                            <div class="feature-item feature-style-left">
                                <div class="feature-icon icon-bg-1 icon-radius">
                                    <i class="fad fa-users"></i>
                                </div>
                                <div class="feature-text">
                                    <h4>{{ __('about-us.f3h') }}</h4>
                                    <p>{{ __('about-us.f3p') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style=" margin-top: 80px;">

            <div class="heading mb-50">

                <h2 class="font-lg about-us-block">{{ __('about-us.heading2') }}</h2>
            </div>

            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-5">
                    <div class="contact-info-wrapper mb-5 mb-lg-0 tas">
                        <h3 style="text-align: center">{{ __('about-us.vision') }}</h3>
                        <p style="text-align: center">{{ __('about-us.vision_paragraph') }}</p>

                        <div class="contact-item">
                            <i class="fa fa-eye fa-3x about-us-icon" style="text-align: center"></i>

                        </div>


                    </div>
                </div>

                <div class="col-xl-6 col-lg-5">
                    <div class="contact-info-wrapper mb-5 mb-lg-0 tas about-us-block">
                        <h3 style="text-align: center">{{ __('about-us.mission') }}</h3>
                        <p style="text-align: center">{{ __('about-us.mission_paragraph') }}</p>

                        <div class="contact-item">
                            <i class="fa fa-bullseye-arrow fa-3x about-us-icon" style="text-align: center"></i>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
