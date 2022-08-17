@extends('layouts.app')
@section('content')

    <!-- Slider Area Start-->
        <div class="slider-area mb-5">
            <div class="slider-active">

                <div class="single-slider slider-height slider-padding sky-blue d-flex align-items-center"
                    id="bgLayoutSwitch" data-background="{{ url('storage/uploads/home_page/'.$imgs_Header[0]->img) }}">
                    <div class="container">
                        <div
                            style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;background: linear-gradient(to right,var(--main-color) ,var(--sub-color));opacity: 0.9;">
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-9 ">
                                <div class="hero__caption text-{{ Session()->get('lang_code')=='en'?'left':'right' }}">
                                    <span class="text-white font-xl-4" data-animation="fadeInUp" data-delay=".4s">{{ $settings->website_name }}</span>
                                    <h1 class="text-white" data-animation="fadeInUp" data-delay=".6s">{{ Session()->get('lang_code')=='en'? $header['title']->en:$header['title']->ar }}</h1>
                                    <p style="{{ Session()->get('lang_code')=='en'?'padding:0px 155px 0px 0px':'padding:0px 0px 0px 155px' }}!important" class="text-white" data-animation="fadeInUp" data-delay=".8s">
                                        {{ Session()->get('lang_code')=='en'? $header['description']->en:$header['description']->ar }}.</p>
                                    <!-- Slider btn -->
                                    <div class="slider-btns">
                                        <!-- Hero-btn -->
                                        <a data-animation="fadeInLeft" data-delay="1.0s" href="#Our-Services"
                                            class="btn radius-btn">{{ __('lang.Start Now') }}</a>
                                        <!-- Video Btn -->
                                        <a data-animation="fadeInRight" data-delay="1.0s"
                                            class="popup-video video-btn ani-btn"
                                            href="#"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hero__img d-none d-lg-block " data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img style="{{ Session()->get('lang_code')=='en'?'right:-63px':'right:0px' }}!important"  class="img-fluid scale-animation" src="{{ url('storage/uploads/home_page/'.$header['main_image']) }}" alt="{{ $header['title']->en.'-'.$header['title']->ar }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <style>
            .slick-track{
                width: 100%!important;
            }

            .under-Hover {
                background: linear-gradient(to bottom, var(--main-color) 0%, var(--main-color) 100%);
                background-position: 0 100%;
                background-repeat: repeat-x;
                background-size: 3px 3px;
                color: #000;
                text-decoration: none;
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg id='squiggle-link' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:ev='http://www.w3.org/2001/xml-events' viewBox='0 0 20 4'%3E%3Cstyle type='text/css'%3E.squiggle{animation:shift .3s linear infinite;}@keyframes shift {from {transform:translateX(0);}to {transform:translateX(-20px);}}%3C/style%3E%3Cpath fill='none' stroke='%23ff9800' stroke-width='2' class='squiggle' d='M0,3.5 c 5,0,5,-3,10,-3 s 5,3,10,3 c 5,0,5,-3,10,-3 s 5,3,10,3'/%3E%3C/svg%3E");
                background-position: 0 100%;
                background-size: auto 6px;
                background-repeat: repeat-x;
                text-decoration: none;
                width: max-content;
            }
        </style>
    <!-- Slider Area End -->


    <!-- Our Services Start -->
    <section id="Our-Services" class="best-features-area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-tittle">
                                <h2 class="under-Hover">
                                    {{-- <hr> --}}
                                    {{ __('lang.Our Services') }}<br><br>
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section-tittle mt-lg-5">
                                <p>{{ Session()->get('lang_code')=='en'? $Desc_services_section->en: $Desc_services_section->ar }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Section caption -->
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-4">
                                <div class="single-features mb-70">
                                    <div class="features-icon pb-3">
                                        <img class="w-75" src="{{ url('storage/uploads/home_page/'.$service['icon']) }}"/>
                                    </div>
                                    <div class="features-caption pl-0">
                                        <h3>{{ Session()->get('lang_code')=='en'? $service['serv_title']->en: $service['serv_title']->ar }}</h3>
                                        <p>{{ Session()->get('lang_code')=='en'? $service['serv_desc']->en: $service['serv_desc']->ar }}.</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- Shpe -->

    </section>
    <!-- Our Services End -->


    <!-- Start How It Works -->
    <div class="container-fluid How-It-Works pt-5" id="How-it-Works" style="background-color:#f2f2f2;">
        <div class="container">
            <div class="row" >
                <div class="col-sm-12">
                    <center>
                        <h2 class="under-Hover">{{ __('lang.How it Works') }}<br><br></h2>
                    </center>
                </div>
            </div>

            <div class="row pt-5">

                @foreach($Works as $Work)
                    <div class="col-sm-6 col-md-4 col-lg-3 ">
                        <center><img src="{{ url('storage/uploads/home_page/'.$Work['img']) }}" alt="" class=""><br>
                            <p class="work_data">{{ Session()->get('lang_code')=='en'? $Work['title']->en: $Work['title']->ar }}</p>
                            <p class="work_data2"> {{ Session()->get('lang_code')=='en'? $Work['description']->en: $Work['description']->ar }}</p>
                            <br><br>
                        </center>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End How It Works -->

    <!-- Start Why Use  -->
    <div id="Why-Use-Awen" class="container warehouse" id="why_depoter">
        <div class="row" style="margin-top:4.5vh;">
            <div class="col-sm-12">
                <center>
                    <h2 class="under-Hover">{{ __('lang.Why Use Awen') }} <br><br></h2>
                    <p class="feature_about22">
                        <p>{{ Session()->get('lang_code')=='en'? $Desc_why_use_awen_section->en: $Desc_why_use_awen_section->ar }} </p>
                    </p><br>
                </center>
            </div>
        </div><br>

        <br>
        <div class="row">
            @foreach($Why_Use_Awen as $service)
                <div class="col-md-4 slideanim slide">
                    <center><img src="{{ url('storage/uploads/home_page/'.$service['img_icon']) }}" alt="ecommerce fulfillment"
                            class="img-responsive why_img"><br>
                        <p class="feature_head"><b>{{ Session()->get('lang_code')=='en'? $service['serv_title']->en: $service['serv_title']->ar }}</b></p>
                        <p class="work_data2">{{ Session()->get('lang_code')=='en'? $service['serv_desc']->en: $service['serv_desc']->ar }}</p><br><br>
                    </center>
                </div>
            @endforeach

        </div>
    </div>
    <!-- End Why Use  -->


    <!-- Start We integrate with -->
    <div id="We-integrate-with" class="container-fluid pt-5">
        <div class="container warehouse">
            <center>
                <h2 class="under-Hover">{{ __('lang.We integrate with') }}<br><br></h2>
            </center>
            <section class="customer-logos " >
                <div class="owl-carousel owl-theme">
                  @foreach($integrate_imgs as $img)
                    <div> <img src="{{ url('storage/uploads/home_page/'.$img['img']) }}"/> </div>
                  @endforeach
                </div>
            </section>

        </div>
    </div>
    <!-- End We integrate with -->



    <!-- Extra Mile Start -->
    <section id="best-features-area" class="best-features-area pb-5 pt-5">
        <div class="container">

            <!-- Section Tittle -->
            <center class="section-tittle">
                <h2 class="under-Hover">{{ __('lang.Extra Mile') }}<br><br> </h2>
            </center>

            <!-- Section caption -->
            <div class="row">
                @foreach($extra_mile as $ex)
                    <div class="col-lg-3 col-md-6">
                        <center>
                            <img class="w-50" src="{{ url('storage/uploads/home_page/'.$ex['img']) }}">
                            <h3 class="pt-4">{{ Session()->get('lang_code')=='en'? $ex['title']->en: $ex['title']->ar }}</h3>
                        </center>
                    </div>
                @endforeach

            </div>

        </div>
        <!-- Shpe -->

    </section>
    <!-- Extra Mile End -->




    <!-- Powerful Platform Start -->
    <section id="Powerful-Platform" class="best-features-area pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-tittle">
                        <h2 class="under-Hover">
                            {{-- <hr> --}}
                            {{ __('lang.Powerful Platform') }}<br><br>
                        </h2>
                        <p>{{ Session()->get('lang_code')=='en'? $Powerful_Platform['description']->en: $Powerful_Platform['description']->ar }} </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-tittle">
                        <img class="w-100" src="{{ url('storage/uploads/home_page/'.$Powerful_Platform['img']) }}">
                    </div>
                </div>
            </div>

        </div>
        <!-- Shpe -->

    </section>
    <!-- Powerful Platform End -->






    <!-- Say Something Start -->
    <div class="say-something-aera pt-90 pb-90 fix">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="offset-xl-1 offset-lg-1 col-xl-5 col-lg-5">
                    <div class="say-something-cap">
                        <h2>{{ __('lang.welcome To') }} <span style="color: var(--sub-color)">{{ $settings->website_name }}</span>.</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="say-btn">
                        <a href="#" class="btn radius-btn">{{ __('lang.contact us') }}</a></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- shape -->
        <div class="say-shape">
            <img src="{{ asset('front-end/img/shape/say-shape-left.png') }}" alt="" class="say-shape1 rotateme d-none d-xl-block">
            <img src="{{ asset('front-end/img/shape/say-shape-right.png')}}" alt="" class="say-shape2 d-none d-lg-block">
        </div>
    </div>
    <!-- Say Something End -->

<script>
    var arrImgs = [
        @foreach ($imgs_Header as $img )
            "{{ url('storage/uploads/home_page/'.$img->img) }}",
        @endforeach
    ];
        var bgLayoutSwitch = document.querySelectorAll('#bgLayoutSwitch')
        var n = 0;
        (async function () {
            setInterval(() => {
                for (let i = 0; i < bgLayoutSwitch.length; i++) {
                    bgLayoutSwitch[i].style.backgroundImage = `url(${arrImgs[n]})`;
                    bgLayoutSwitch[i].style.backgroundSize = '100% 100%'

                    n++;
                    if (n > arrImgs.length - 1) {
                        n = 0
                    }
                }
            }, 3900);
        })();
</script>

@endsection
