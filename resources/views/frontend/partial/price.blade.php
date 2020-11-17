<section class="junior__classes__area section-lg-padding--top section-padding--md--bottom bg--white" id="price">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="section__title text-center">
                    <h2 class="title__line">Choose Your Price Plan</h2>
                </div>
            </div>
        </div>
        <div class="row classes__wrap activation__one owl-carousel owl-theme clearfix mt--40">
            <!-- Start Single Classes -->
            @foreach($price as $key=>$price)
            <div class="col-lg-4 col-sm-6">
                <div class="junior__classes">
                    <div class="classes__thumb">
                        <a href="class-details.html">
                            <img src="{{asset('uploade/price/'.$price->image)}}" alt="class images">
                        </a>
                    </div>
                    <div class="classes__inner">
                        <div class="classes__icon">
                            <img src="{{asset('/frontend/images/class/star/1.png')}}" alt="starr images">
                            <span>{{$price->price}} TK</span>
                        </div>
                        <div class="class__details">
                            <h4><a href="#subscription">{{$price->package_name}}</a></h4>
                            <ul class="class__time">
                                <li>{{$price->price}}+VAT+SD+SC BDT</li>
                                <li>{{$price->price}}</li>
                                <li>For {{$price->network}} Users</li>
                            </ul>
                            <div class="class__btn">
                                @if(isset($msisdn))
                                    <div class="dcare__btn btn__gray min__height-btn">
                                        <a href="{{ route('gp.subRequest',[$msisdn ,$price->package_name]) }}">Subscribe Now</a>  </div>
                                @else
                                 <a class="dcare__btn btn__gray min__height-btn login-trigger" href="#subscription">Subscribe Now !</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
            <!-- End Single Classes -->

            <!-- End Single Classes -->
            <!-- Start Single Classes -->

            <!-- End Single Classes -->
            <!-- Start Single Classes -->

            <!-- End Single Classes -->
        </div>
    </div>
</section>
<div class="login-wrapper"  id="subscription">
    <div class="accountbox">
        <div class="accountbox__inner">
            <h4> Continue To Subscription</h4>
            <div class="accountbox__login">
                <form action="#">

                    <div class="single-input">
                        <input id="mobile" type="text" placeholder="Phone Number......">
                    </div>
                    <div class="single-input text-center">
                        <button type="submit" id="Submit" class="sign__btn">SUBMIT</button>
                    </div>
                    @csrf
                </form>
            </div>
            <span class="accountbox-close-button"><i class="zmdi zmdi-close"></i></span>
        </div>
        <h3> Learn Engage Bond</h3>
    </div>
</div><!-- //Login Form -->


<script src="{{asset('/frontend/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script>

    jQuery(document).ready(function(){
        jQuery('#Submit').click(function(e){

            var sld = document.getElementById("mobile").value;
            var _token = document.getElementsByName("_token")[0].value;
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': _token
                }
            });
            jQuery.ajax({
                url: "{{ url('http://127.0.0.1:8000/subscription/check') }}",
                method: 'post',
                data: {
                    uid: sld,
                },
                success: function(result){
                    if(result.status == true){
                        window.open('{{route('myvideos')}}', '_self');
                    }else{
                        var url = '{{ route("price", ":sld") }}';
                        url = url.replace(':sld',sld);
                        // alert(url);
                        window.open(url+'/#price', '_self');
                        // location.reload();
                    }
                }});
        });
    });
</script>
