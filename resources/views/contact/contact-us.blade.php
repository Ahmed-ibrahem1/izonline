@extends('layout.layout')

@section('content')

<section class="page-header">
    <div class="container" dir="ltr">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-8">
                <div class="title-block">
                    <h1>{{ __('header.contact') }}</h1>
                    <ul class="header-bradcrumb justify-content-center">
                        <li><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                        <li class="active" aria-current="page">{{ __('header.contact') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact section start -->
<section class="contact section-padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-4 col-lg-5">
                <div class="contact-info-wrapper mb-5 mb-lg-0 tas">
                    <h3>{{ __('contact-us.title1') }}
                        <span>{{ __('contact-us.title2') }}</span>
                    </h3>
                    <p>{{ __('contact-us.paragraph') }}</p>

                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <h5>{{ config('client-info.contact_email') }}</h5>
                    </div>

                    <div class="contact-item">
                        <i class="fa fa-phone-alt"></i>
                        <h5>{{ config('client-info.phone_number') }}</h5>
                    </div>

                    <div class="contact-item">
                        <i class="fa fa-map-marker"></i>
                        <h5><a href="https://goo.gl/maps/3NZH3dyjKJb24Rb18" target="_blank">{{ __(config('client-info.address')) }}</a></h5>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 col-lg-6">
                <form class="contact__form form-row " method="post" action="mail.php" id="contactForm">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                {{ __('contact-us.sent-success') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('contact-us.your-name') }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="{{ __('login.email') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="{{ __('contact-us.subject') }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="{{ __('contact-us.your-message') }}"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-center">
                            <button class="btn btn-main w-100 rounded" type="submit">{{ __('contact-us.send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact section End -->

<!-- Map section start -->
<section class="map">
    <div id="map"></div>
</section>
<!-- Map section End -->
@endsection