<?php
$phone = '';
if(isset($_SERVER['HTTP_MSISDN'])){
    $result = $_SERVER['HTTP_MSISDN'];
    $phone = substr($result, -11);
}
session()->put('phone',$phone);
?>

<header id="header" class="jnr__header header--one clearfix">
    <!-- Start Header Top Area -->
    <div class="junior__header__top">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-6 col-sm-12">
                    <div class="jun__header__top__left">
                        <ul class="top__address d-flex justify-content-start align-items-center flex-wrap flex-lg-nowrap flex-md-nowrap">
                            <li><i class="fa fa-envelope"></i><a href="#">leenboinfo@mail.com</a></li>
                            <li><i class="fa fa-phone"></i><span>Contact Now :</span><a href="#">+001794071369</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 col-sm-12">
                    <div class="jun__header__top__right">
                        <ul class="accounting d-flex justify-content-lg-end justify-content-md-end justify-content-start align-items-center">
                            <li><a class="login-trigger" href="#">Subscribe</a></li>
                            <li><a class="accountbox-trigger" href="#">Unsubscribe</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Start Mainmenu Area -->
    <div class="mainmenu__wrapper bg__cat--1 poss-relative header_top_line sticky__header">
        <div class="container">
            <div class="row d-none d-lg-flex">
                <div class="col-sm-4 col-md-6 col-lg-2 order-1 order-lg-1">
                    <div class="logo">
                        <a href="{{route('welcome')}}">
                            <img src="{{asset('/frontend/images/logo/logo.png')}}" alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2 col-lg-9 order-3 order-lg-2">
                    <div class="mainmenu__wrap">
                        <nav class="mainmenu__nav">
                            <ul class="mainmenu">
                                <li class="drop"><a href="{{route('welcome')}}">Home</a></li>
                                <li class="drop"><a href="{{route('myvideos')}}">My Videos</a></li>
                                <li class="drop"><a href="{{route('story')}}">Our Story</a></li>

                                <li class="drop"><a href="#price">Subscribe</a> </li>

                                <li><a href="{{route('faq')}}">FAQ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                    <div class="shopbox d-flex justify-content-end align-items-center">
                        <a class="minicart-trigger" href="#">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                        <span>03</span>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('/frontend/images/logo/logo.png')}}" style="height: 80px; width: 120px;" alt="logo"></a>
                </div>
                <a class="minicart-trigger" href="#">
                    <i class="fa fa-shopping-basket"></i>
                </a>
            </div>
            <!-- Mobile Menu -->
        </div>
    </div>
    @include('frontend.partial.msg')
    <!-- End Mainmenu Area -->
</header>
