<header id="header" class="header-style-3" dir="ltr">


    <div class="menu-wrapper">
        <div class="header-mid">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-socials d-none d-lg-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="{{ config('client-info.facebook') }}"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="{{ config('client-info.instagram') }}"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-5 col-xl-3 col-lg-3 col-sm-4 col-md-3">
                        <div class="site-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logos/logo-dark.png') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-7 col-xl-4 col-lg-4 col-sm-8">
                        <div class="offcanvas-icon d-block d-lg-none text-end">
                            <a href="#" class="nav-toggler"><i class="fal fa-bars lh-3"></i></a>
                        </div>

                        <div class="float-end d-none d-lg-block">
                            <div class="header-info d-flex align-items-center"
                                style="position: relative;
                            right: -100;">
                                <div class="header-search-bar d-none d-xl-block ms-4">
                                    <form id="search-form" action="{{ route('programs.index') }}" method="GET"
                                        class="mb-0">
                                        <input type="text" class="form-control rounded-pill" name="search"
                                            placeholder="{{ __('header.search') }}"
                                            style="
                                        width: 194px;
                                    ">
                                        <a onclick="document.getElementById('search-form').submit();"
                                            class="search-submit"><i class="far fa-search lh-2"></i></a>
                                    </form>
                                </div>

                                @guest
                                    <div class="header-user ms-4 m-auto">
                                        <a href="{{ route('login') }}" id="user-icon"><i class="fa fa-user lh-2"></i></a>
                                    </div>
                                @else
                                    <div class="dropdown header-user ms-4 m-auto rounded-pill w-auto">
                                        <a role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"
                                            id="user-icon" class="ps-3 pe-3 dropdown-toggle"><i class="fa fa-user lh-2"></i>
                                            <span class="ps-2">{{ auth()->user()->first_name }}</span>
                                        </a>
                                        <ul class="dropdown-menu profile-dropdown tar" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item text-black-50"
                                                    href="{{ route('user.dashboard') }}">{{ __('header.dashboard') }}</a>
                                            </li>
                                            <li><a class="dropdown-item text-black-50"
                                                    href="{{ route('user.my-account') }}">{{ __('header.my-account') }}</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form class="dropdown-item pt-0 pb-0 mb-0"
                                                    action="{{ route('session.destroy') }}" method="post" class="mb-0">
                                                    @csrf
                                                    <input type="submit"
                                                        class=" text-black-50 bg-transparent border-0 w-100 tas p-0"
                                                        value="{{ __('header.logout') }}" />
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endguest
                                <div class="header-navbar style-1 ">
                                    <div class="container">
                                        
                                            <ul class="primary-menu">
                                                <li class="lang-switcher">
                                                    <a href="#">{{ __('header.language') }}</a>
                                                    <ul class="submenu">
                                                        @foreach (config('languages') as $lang_key => $language)
                                                            <li>
                                                                <a href="{{ route('switch_language', $lang_key) }}">
                                                                    <img src="{{ $language['flag'] }}"
                                                                        class="rounded-circle me-1" width="25%">
                                                                    {{ $language['title'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-navbar menu-center style-1 ">
            <div class="container">
                <nav class="site-navbar">
                    <ul class="primary-menu">
                        <li><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                        <li>
                            <a href="{{ route('programs.index') }}">{{ __('header.programs') }}</a>
                            <ul class="submenu tar">
                                @php
                                    $categories = \App\Models\Category::tree();
                                @endphp
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('programs.index') }}?category_id={{ $category->id }}">{{ $category->title }}</a>
                                        @if ($category->children->isNotEmpty())
                                            <ul class="submenu">
                                                @foreach ($category->children as $childCategory)
                                                    <li><a
                                                            href="{{ route('programs.index') }}?category_id={{ $childCategory->id }}">{{ $childCategory->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('about-us') }}">{{ __('header.about') }}</a></li>
                        <li><a href="{{ route('contact-us') }}">{{ __('header.contact') }}</a></li>

                        <div class="d-lg-none">
                            @guest
                                <li><a href="{{ route('login') }}">{{ __('header.login') }}</a></li>
                            @else
                                <li>
                                    <a href="#">{{ auth()->user()->first_name }}</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('user.dashboard') }}">{{ __('header.dashboard') }}</a></li>
                                        <li><a href="{{ route('user.my-account') }}">{{ __('header.my-account') }}</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('session.destroy') }}" method="post" class="mb-0">
                                                @csrf
                                                <input type="submit" class="text-white-50 bg-transparent"
                                                    value="{{ __('header.logout') }}" />
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </div>
<div id="mobileshow">
                        <li class="lang-switcher">
                            <a href="#">{{ __('header.language') }}</a>
                            <ul class="submenu">
                                @foreach (config('languages') as $lang_key => $language)
                                    <li>
                                        <a href="{{ route('switch_language', $lang_key) }}">
                                            <img src="{{ $language['flag'] }}"
                                                class="rounded-circle me-1" width="25%">
                                            {{ $language['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
</div>
                    </ul>

                    <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--====== Header End ======-->
