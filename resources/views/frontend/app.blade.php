<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Learn Engage Bond')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('/frontend/images/icon.png')}}">
    <!-- Google font (font-family: 'Lobster', Open+Sans;) -->
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('/frontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/modal-video.min.css')}}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{asset('/frontend/css/custom.css')}}">

    <!-- Modernizer js -->
    <script src="{{asset('/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>


    <style>
        @foreach($sliders as $key=>$slider)
          .bg-pngimage--{{$key +1 }} {
            background-image: url({{asset('uploade/slider/'.$slider->image)}});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        @endforeach

        @foreach($items as $key=>$item)
            .bg--white--{{$key + 1}} {
            background-image: url({{asset('uploade/thumbnail/'.$item->thumbnail)}});
        }


        @endforeach



    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- <div class="fakeloader"></div> -->

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
    <!-- Header -->
@include('frontend.partial.header')
<!-- //Header -->

@yield('content')
<!-- Strat Slider Area -->

<!-- End Slider Area -->

    <!-- Start Welcame Area -->

<!-- End Welcame Area -->

    <!-- Start Our Service Area -->

    <!-- End Our Service Area -->

    <!-- Start Call To Action -->

    <!-- End Call To Action -->

    <!-- Start our Class Area -->

<!-- End upcomming Area -->
    <!-- Start Subscribe Area -->

    <!-- End Subscribe Area -->
    <!-- Footer Area -->
    @include('frontend.partial.footer');
    <!-- //Footer Area -->
    <!-- Cartbox -->
    <div class="cartbox-wrap">
        <div class="cartbox text-right">
            <button class="cartbox-close"><i class="zmdi zmdi-close"></i></button>
            <div class="cartbox__inner text-left">
                <div class="cartbox__items">
                    <!-- Cartbox Single Item -->
                    <div class="cartbox__item">
                        <div class="cartbox__item__thumb">
                            <a href="product-details.html">
                                <img src="{{asset('/frontend/images/product/sm-pro/1.jpg')}}" alt="small thumbnail">
                            </a>
                        </div>
                        <div class="cartbox__item__content">
                            <h5><a href="product-details.html" class="product-name">brown jacket</a></h5>
                            <p>Qty: <span>01</span></p>
                            <span class="price">$15</span>
                        </div>
                        <button class="cartbox__item__remove">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                    <!-- //Cartbox Single Item -->
                    <!-- Cartbox Single Item -->
                    <div class="cartbox__item">
                        <div class="cartbox__item__thumb">
                            <a href="product-details.html">
                                <img src="{{asset('/frontend/images/product/sm-pro/2.jpg')}}" alt="small thumbnail">
                            </a>
                        </div>
                        <div class="cartbox__item__content">
                            <h5><a href="product-details.html" class="product-name">long sleeve t-shirt</a></h5>
                            <p>Qty: <span>01</span></p>
                            <span class="price">$25</span>
                        </div>
                        <button class="cartbox__item__remove">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div><!-- //Cartbox Single Item -->
                    <!-- Cartbox Single Item -->
                    <div class="cartbox__item">
                        <div class="cartbox__item__thumb">
                            <a href="product-details.html">
                                <img src="images/product/sm-pro/3.jpg" alt="small thumbnail">
                            </a>
                        </div>
                        <div class="cartbox__item__content">
                            <h5><a href="product-details.html" class="product-name">black polo shirt</a></h5>
                            <p>Qty: <span>01</span></p>
                            <span class="price">$30</span>
                        </div>
                        <button class="cartbox__item__remove">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                    <!-- //Cartbox Single Item -->
                </div>
                <div class="cartbox__total">
                    <ul>
                        <li><span class="cartbox__total__title">Subtotal</span><span class="price">$70</span></li>
                        <li class="shipping-charge"><span class="cartbox__total__title">Shipping Charge</span><span class="price">$05</span></li>
                        <li class="grandtotal">Total<span class="price">$75</span></li>
                    </ul>
                </div>
                <div class="cartbox__buttons">
                    <a class="dcare__btn" href="cart.html"><span>View cart</span></a>
                    <a class="dcare__btn" href="checkout.html"><span>Checkout</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- //Cartbox -->

    <!-- Register Form -->
    <div class="accountbox-wrapper">
        <div class="accountbox">
            <div class="accountbox__inner">
                <h4>Continue to Unsubscription</h4>
                <div class="accountbox__login">
                    <form action="#">
                        <div class="single-input">
                            <input  type="text" placeholder="Enter Your Number....">
                        </div>

                        <div class="single-input text-center">
                            <button type="submit" class="sign__btn">Unsubscribe</button>
                        </div>

                    </form>
                </div>
                <span class="accountbox-close-button"><i class="zmdi zmdi-close"></i></span>
            </div>
            <h3>Learn Engage Bond</h3>
        </div>
    </div><!-- //Register Form -->

    <!-- Login Form -->



</div><!-- //Main wrapper -->

<!-- JS Files -->
<script src="{{asset('/frontend/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/js/plugins.js')}}"></script>
<script src="{{asset('/frontend/js/active.js')}}"></script>
<script src="{{asset('/frontend/js/jquery-modal-video.min.js')}}"></script>

<script>
    $(document).ready(function() {
        // Gets the video src from the data-src on each button
        var $videoSrc;
        $(".video-btn").click(function() {
            $videoSrc = $(this).attr("data-src");
            console.log("button clicked" + $videoSrc);
        });

        // when the modal is opened autoplay it
        $("#myModal").on("shown.bs.modal", function(e) {
            console.log("modal opened" + $videoSrc);
            // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
            $("#video").attr(
                "src",
                $videoSrc + "?amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1"
            );
        });

        // stop playing the youtube video when I close the modal
        $("#myModal").on("hide.bs.modal", function(e) {
            // a poor man's stop video
            $("#video").attr("src", '');


        });

        // document ready
    });
</script>



</body>
</html>


