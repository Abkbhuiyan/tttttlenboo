<div class="slide__carosel owl-carousel owl-theme">
    @foreach($sliders as $key=>$slider)
        <div class="slider__area bg-pngimage--{{$key +1 }}  d-flex fullscreen justify-content-start align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="slider__activation">
                            <!-- Start Single Slide -->
                            <div class="slide">
                                <div class="slide__inner">
                                    <h1>{{$slider->title}}</h1>
                                    <div class="slider__text">
                                        <h2>{{$slider->sub_title}}</h2>
                                    </div><br><br><br>
                                    <div class="slider__btn d-flex justify-content-center">
                                        <a class="dcare__btn" href="#price">Subscribe Now!!</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slide -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
