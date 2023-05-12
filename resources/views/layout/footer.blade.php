<!-- Footer section start -->
<section class="footer footer-3 {{ Illuminate\Support\Facades\Route::is('home') ? 'pt-250' : '' }}">
    <div class="footer-mid">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-8 me-auto">
                    <div class="widget footer-widget mb-5 mb-lg-0">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/images/logos/logo-white.png') }}" alt="" class="img-fluid">
                        </div>

                        <p class="mt-4">{{ __('footer.w1-paragraph') }}</p>

                        <ul class="d-flex px-0">
                            <li> <img src="{{ asset('assets/images/payment/visa.png') }}"> </li>
                            <li> <img class="px-1" src="{{ asset('assets/images/payment/mastercard.png') }}"> </li>
                            <li> <img src="{{ asset('assets/images/payment/valu.png') }}"> </li>
                            <li> <img class="px-1" src="{{ asset('assets/images/payment/sympl.png') }}"> </li>
                        </ul>

                        <div class="footer-socials mt-5">
                            <span class="me-2">{{ __('footer.w1-connect') }}</span>
                            <a href="{{ config('client-info.facebook') }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ config('client-info.instagram') }}"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>



                <div class="col-xl-3 col-sm-4 ps-xl-5">
                    <div class="footer-widget mb-5 mb-lg-0">
                        <h5 class="widget-title">{{ __('footer.w2-title') }}</h5>
                        <ul class="list-unstyled footer-links">
                            <li><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                            <li><a href="{{ route('programs.index') }}">{{ __('header.programs') }}</a></li>
                            <li><a href="{{ route('about-us') }}">{{ __('header.about') }}</a></li>
                            <li><a href="{{ route('contact-us') }}">{{ __('header.contact') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-4">
                    <div class="footer-widget mb-5 mb-lg-0">
                        <h5 class="widget-title ">{{ __('footer.w3-title') }}</h5>
                        <ul class="list-unstyled footer-links">
                            @php
                                $categories = \App\Http\Controllers\HomeController::getCategories(4);
                            @endphp
                            @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('programs.index') }}?category_id={{ $category->id }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-4">
                    <div class="footer-widget mb-5 mb-lg-0">
                        <h5 class="widget-title">{{ __('footer.w4-title') }}</h5>
                        <ul class="list-unstyled footer-links">
                            <li><a
                                    href="tel:{{ config('client-info.phone_number') }}">{{ config('client-info.phone_number') }}</a>
                            </li>
                            <li><a
                                    href="mailto:{{ config('client-info.contact_email') }}">{{ config('client-info.contact_email') }}</a>
                            </li>
                            <li><a href="https://goo.gl/maps/3NZH3dyjKJb24Rb18"
                                    target="_blank">{{ __(config('client-info.address')) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-btm" dir="ltr">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-sm-12 col-lg-6">
                    <p class="mb-0 copyright text-sm-center text-lg-start">© {{ date('Y') }} All rights reserved by
                        <a href="{{ config('app.url') }}" rel="nofollow">{{ config('app.name') }}</a>
                    </p>
                </div>

                <div class="col-xl-6 col-sm-12 col-lg-6">
                    <div class="footer-btm-links text-start text-sm-center text-lg-end">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a
                                    href="{{ route('privacy-policy') }}">{{ __('footer.bottom-bar-privacy') }}</a>
                            </li>
                            <li class="list-inline-item"><a
                                    href="{{ route('terms-and-conditions') }}">{{ __('footer.bottom-bar-terms-and-conditions') }}</a>
                            </li>
                            <li class="list-inline-item"><a
                                    href="{{ route('contact-us') }}">{{ __('header.contact') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up lh-18"></i></a>
    </div>

</section>
<!-- Footer section End -->
