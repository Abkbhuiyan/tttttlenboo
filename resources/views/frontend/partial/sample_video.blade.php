<section class="junior__service bg-image--1 section-padding--bottom section--padding--xlg--top">
    <div class="container">
        <div class="row">
            <!-- Start Single Service -->
          @foreach($items as $key=>$item)

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="service bg--white--{{$key +1 }} border__color wow fadeInUp">
                        <div class="service__icon">
                            <img src="{{asset('uploade/thumbnail/'.$item->thumbnail)}}">
                            <span class="badge">{{$items->count()}}</span>
                        </div>
                        <div class="service__details">
                            <div class="service__btn">
                                <button type="button" class="btn btn-success video-btn" data-toggle="modal"
                                        data-src="{{asset('uploade/item/'.$item->image)}}" data-target="#myModal">
                                    <i class="fa fa-play"></i>

                                </button>
                            </div><br><br>
                            <h6>{{$item->name}}</h6>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>
                </div>
              @endforeach
            <!-- End Single Service -->
            <!-- Start Single Service -->

            <!-- End Single Service -->
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>></iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>