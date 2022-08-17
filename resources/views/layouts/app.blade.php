<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>


    @include('seo.index')
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />


    <link rel="stylesheet" type="text/css" href="{{asset('/css/font-fileuploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader-theme-dragdrop.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Front-end CSS here -->
    <link rel="stylesheet" href="{{ asset('front-end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">
    <style>
        :root {
            --main-color: #fcbd2a;
            --sub-color: #164271;
        }
    </style>

    {!!$settings->header_code!!}
    @livewireStyles
    @if(auth()->check())
        @php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        @endphp
    @endif
    <style type="text/css">
        body,*{
            direction: {{ Session()->get('lang_code')=='en'?'ltr':'rtl' }};

        }
        html{
            font-size: 16px;
        }
        /**:not(.fileuploader):not([class^=fa]):not([class^=vj]):not([class^=tie-]) {
            font-family: dubai, sans-serif;
        }*/
        .start-head {
            height: 20px;
            width: 12px;
            display: inline-block;
            background: #0194fe;
            position: relative;
            top: 5px;
            margin-left: 5px;
        }
        .main-box-stylex{
            box-shadow: 0 8px 16px 0 rgb(10 14 29 / 2%), 0 8px 64px 0 rgb(119 119 119 / 8%);
        }
        .slider-area .hero__img img{
            {{ Session()->get('lang_code')=='en'?'right: -63px;':'left: -63px;' }}
        }
        .slicknav_btn{
            top: -60px!important;
        }
    </style>

        {{-- @if (Session()->get('lang_code')=='ar')
            <style>
                .slicknav_btn{
                    margin-top: 0px;
                    right: 90%;
                }
            </style>
        @endif --}}


    @yield('styles')
</head>
<body>
    @yield('after-body')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('storage/uploads/website/'.$settings->website_logo) }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->



    <div id="app">

        <header>
            <!-- Header Start -->
            <div class="header-area header-transparrent bg-white">
                <div class="main-header header-sticky">
                    <div class="container-fluid ">
                        <div class="row d-flex align-items-center justify-content-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('front-end/img/logo/logo.png') }}" alt="{{ $settings->website_name }}"></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <!-- Main-menu -->
                                <div class="main-menu {{ Session()->get('lang_code')=='en'?'f-right':'f-left' }} d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="active"><a href="{{ url('/') }}"> {{ __('lang.Home') }}</a></li>
                                            <li><a href="{{ url('/#Our-Services') }}">{{ __('lang.Our Services') }} </a></li>
                                            <li><a href="{{ url('/#How-it-Works') }}">{{ __('lang.How it Works') }}</a></li>
                                            <li><a href="#">{{ __('lang.Pages') }} <i class="fa fa-arrow-down"></i></a>
                                                <ul class="submenu text-{{ Session()->get('lang_code')=='en'?'left':'right'}}">
                                                    @foreach(App\Models\Page::get() as $page)
                                                        <li><a href="{{route('page.show',['page'=>$page])}}">{{ Session()->get('lang_code')=='en'? $page->title_en: $page->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <!--Start  Authentication Links -->
                                                @guest
                                                    @if (Route::has('login'))
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('login') }}">{{ __('lang.login') }}</a>
                                                        </li>
                                                    @endif

                                                    @if (Route::has('register'))
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('register') }}">{{ __('lang.register') }}</a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li><a href="#">{{ Auth::user()->name }} <i class="fa fa-arrow-down"></i></a>
                                                        <ul class="submenu text-{{ Session()->get('lang_code')=='en'?'left':'right'}}">
                                                            <li><a href="{{ route('admin.index') }}">{{ __('lang.Dashboard') }} </a></li>
                                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('lang.Logout') }}</a></li>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </ul>
                                                    </li>

                                                @endguest
                                            <!-- End Authentication Links -->

                                            <!-- Start Switch Language -->
                                            <li>
                                                <a>
                                                    @if (Session()->get('lang_code')=='en')
                                                        <img style="width: 40px" src="{{ asset('front-end/img/elements/f3.jpg') }}"/>
                                                        {{-- EN <span class="fi fi-us"></span> --}}
                                                    @else
                                                        <img style="width: 40px" src="{{ asset('front-end/img/elements/saudi-arabia.png') }}"/>
                                                    @endif
                                                </a>
                                                <ul class="submenu text-{{ Session()->get('lang_code')=='en'?'left':'right'}}">
                                                    <li>
                                                        <a class="dropdown-item" href="{{url('change-language')}}/{{app()->getlocale()=='en'?'ar':'en'}}">
                                                            @if (Session()->get('lang_code')=='en')
                                                                AR <img style="width: 40px" src="{{ asset('front-end/img/elements/saudi-arabia.png') }}"/>
                                                            @else
                                                                EN <img style="width: 40px" src="{{ asset('front-end/img/elements/f3.jpg') }}"/>
                                                            @endif
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!-- End Switch Language -->

                                            <li style="padding: 0;" class="btn btn-nav"><a class="text-white btn" href="{{ url('contact') }}">{{ __('lang.contact us') }} </a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div style="" class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
        </header>


        @if(flash()->message)
            <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #2196f3;color: #fff;cursor: pointer;"  onclick="$(this).slideUp();">
                <span class="fas fa-info-circle"></span> {{ flash()->message }}
            </div>
        @endif
        <div class="col-12 justify-content-end d-flex">
            @if($errors->any())
            <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
                {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
            </div>
            @endif
        </div>

    {{-- Start Conetnt --}}
        <main class="p-0 pt-5 mt-5 text-{{ Session()->get('lang_code')=='en'?'left':'right' }}">
            @yield('content')
        </main>
    {{-- End Content --}}



    <footer>
        <!-- Footer Start-->
        <div class="footer-main text-{{ Session()->get('lang_code')=='en'? 'left': 'right' }}">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row  justify-content-between">
                        <div class="col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('front-end/img/logo/logo.png') }}" alt="{{ $settings->website_name }}"></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>{{ __('lang.Quick Links') }}</h4>
                                    <ul><!-- $settings->website_bio -->
                                        <li><a href="{{ url('/') }}">{{ __('lang.Home') }}</a></li>
                                        <li><a href="{{ url('/#Our-Services') }}">{{ __('lang.Our Services') }}</a></li>
                                        <li><a href="{{ url('/#How-it-Works') }}">{{ __('lang.How it Works') }}</a></li>
                                        <li><a href="{{ url('/#Why-Use-Awen') }}">{{ __('lang.Why Use Awen') }}</a></li>
                                        <li><a href="{{ url('/#We-integrate-with') }}">{{ __('lang.We integrate with') }}</a></li>
                                        <li><a href="{{ url('/#Powerful-Platform') }}">{{ __('lang.Powerful Platform') }}</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>{{ __('lang.Pages') }}</h4>
                                    <ul>
                                        @foreach(App\Models\Page::get() as $page)
                                            <li><a href="{{route('page.show',['page'=>$page])}}">{{ Session()->get('lang_code')=='en'? $page->title_en: $page->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>{{ __('lang.contact us') }}</h4>
                                    <div class="footer-pera footer-pera2 row">
                                        @if ($settings->phone)
                                            <a class="col btn-social" href="tel:{{ $settings->phone }}">
                                                <i class="fa-solid fa-phone"></i>
                                            </a>
                                        @endif

                                        @if ($settings->facebook_link)
                                            <a class="col btn-social" href="{{ $settings->facebook_link }}">
                                                <i class="fa-brands fa-square-facebook"></i>
                                            </a>
                                        @endif

                                        @if ($settings->twitter_link)
                                            <a class="col btn-social" href="{{ $settings->twitter_link }}">
                                                <i class="fa-brands fa-square-twitter"></i>
                                            </a>
                                        @endif

                                        @if ($settings->instagram_link)
                                            <a class="col btn-social" href="{{ $settings->instagram_link }}">
                                                <i class="fa-brands fa-square-instagram"></i>
                                            </a>
                                        @endif

                                        @if ($settings->youtube_link)
                                            <a class="col btn-social" href="{{ $settings->youtube_link }}">
                                                <i class="fa-brands fa-square-youtube"></i>
                                            </a>
                                        @endif

                                        @if ($settings->telegram_link)
                                            <a class="col btn-social" href="{{ $settings->telegram_link }}">
                                                <i class="fa-brands fa-telegram"></i>
                                            </a>
                                        @endif

                                        @if ($settings->linkedin_link)
                                            <a class="col btn-social" href="{{ $settings->linkedin_link }}">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        @endif

                                        @if ($settings->whatsapp_link)
                                            <a class="col btn-social" href="{{ $settings->whatsapp_link }}">
                                                <i class="fa-brands fa-square-whatsapp"></i>
                                            </a>
                                        @endif

                                        @if ($settings->tiktok_link)
                                            <a class="col btn-social" href="{{ $settings->tiktok_link }}">
                                                <i class="fa-brands fa-tiktok"></i>
                                            </a>
                                        @endif

                                        <a class="text-white btn" href="{{ url('contact') }}">{{ __('lang.contact us') }} </a>


                                    </div>
                                    <!-- Form -->
                                    {{-- <div class="footer-form">
                                        <div id="mc_embed_signup">
                                            <form target="_blank"
                                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                                method="get" class="subscribe_form relative mail_part"
                                                novalidate="true">
                                                <input type="email" name="EMAIL" id="newsletter-form-email"
                                                    placeholder=" Email Address " class="placeholder hide-on-focus"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = ' Email Address '">
                                                <div class="form-icon">
                                                    <button type="submit" name="submit" id="newsletter-submit"
                                                        class="email_icon newsletter-submit button-contactForm"><img
                                                            src="assets/img/shape/form_icon.png" alt=""></button>
                                                </div>
                                                <div class="mt-10 info"></div>
                                            </form>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Copy-Right -->
                    <div class="row align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>document.write(new Date().getFullYear())</script> {{ __('lang.Copyright © 2022 All rights reserved') }} <i class="fa fa-heart" aria-hidden="true"></i>  <a
                                        href="{{ url('/') }}" target="_blank">{{ $settings->website_name }}</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->

    </footer>



    </div>

    <a href="https://api.whatsapp.com/send/?phone={{ $settings->whatsapp_phone??$settings->whatsapp_link }}" style="position: fixed;bottom: 20px;left: 20px ;z-index: 12000010001;">
        <img width="70px" src="{{ asset('front-end/img/whatsapp.png') }}">
    </a>

    <style>
        .btn-social{
            padding: 15px;
            background-color: var(--sub-color);
            border-radius: 2px;
            font-size: 1.8em;
            margin: 2px;
            text-align: center;
        }
        .btn-social:hover{
            background-color: var(--main-color);
            color: var(--sub-color);
        }
    </style>

    <input type="hidden" id="current_selected_editor">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    <script src="{{asset('/js/jquery.fileuploader.min.js')}}"></script>
    <script src="{{asset('/js/validatorjs.min.js')}}"></script>
    <script src="{{asset('/js/favicon_notification.js')}}"></script>
    @if (app()->getlocale()=='en')
        <script src="{{asset('/js/main-en.js')}}"></script>
    @else
        <script src="{{asset('/js/main.js')}}"></script>
    @endif



    <!-- JS Front-end here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('front-end/js/vendor/modernizr-3.5.0.min.js') }}"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('front-end/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('front-end/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('front-end/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-end/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('front-end/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('front-end/js/wow.min.js') }}"></script>
    <script src="{{ asset('front-end/js/animated.headline.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('front-end/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('front-end/js/contact.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.form.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('front-end/js/mail-script.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('front-end/js/plugins.js') }}"></script>

    <script src="{{ asset('front-end/js/main.js') }}"></script>


    <script>

        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:4,
            center: true,
            rtl: {{ Session()->get('lang_code')=='en'?'false':'true' }},
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                    0:{
                        items:2,
                        center: true,
                        nav:false
                    },
                    600:{
                        items:3,
                        center: true,
                        nav:false
                    },
                    1000:{
                        items:4,
                        center: true,
                        loop:true,
                        nav:false
                    }
                }
        });


        var scrollUp = document.getElementById('scrollUp')
        scrollUp.innerHTML ='<i class="fa fa-arrow-up"></i>';
    </script>

    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')
    {!!$settings->footer_code!!}
    <script src="https://kit.fontawesome.com/7b5e9f3ec6.js" crossorigin="anonymous"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/62fc9f6a37898912e9637700/1galcte0n';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
</body>
</html>
