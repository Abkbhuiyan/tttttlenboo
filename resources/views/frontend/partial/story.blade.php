@extends('frontend.app')
@section('title','Learn Engage Bond')

@push('css')

@endpush

@section('content')

    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="blog-left">
                <h1>Role of Active Parenting in Child's Learning & Development</h1>
                <div class="blog-left-subheading">
                    <ul>
                        <li><a>By Ankita </a></li>
                        <!--        <li><a>Child Development</a></li>-->
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{asset('/')}}frontend/images/story/blog_imgparent.gif" class="blog-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="blog-detail">Kids are very curious but frequently complaints about their boredom.</p>
                    <p class="blog-detail">Every parent wants to make his or her kid's to be smarter to compete with today's world competition.
                        Wide exposure, good nurturing,
                        enhanced skills, and knowledge can give them a strong foundation to lead a good and successful life.</p>
                    <p class="blog-detail">Active parenting is a modern way of nurturing that help to give the best value-added nurturing to every child.
                        It helps every parent to teach the difference between good and bad to kids in a very interesting way.</p>
                </div>

            </div>


            <div class="blog-artical-heading">AD:smsnmail.com</div>
            <img src="{{asset('/')}}frontend/images/story/smsnmailadd.jpg" class="blog-img">



            <div class="blog-left">
                <h1>Benefits of everyday value-added talks between parent and children</h1>
                <div class="blog-left-subheading">
                    <ul>
                        <li><a>By Ankita  </a></li>
                        <!--     <li><a>Child Development</a></li>-->
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{asset('/')}}frontend/images/story/blog_imgparent.gif" class="blog-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="blog-detail">Everyday talks allow making a strong and trustable bond between parents and kids.</p>
                    <p class="blog-detail">Everyday healthy interactions allow kids to share their thoughts with parents.</p>
                    <p class="blog-detail">Active parenting encourages goodness in kids behavior and thought the process in a positive manner.</p>

                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="blog-artical-right">
                <a href="blog2.html"><div class="blog-artical-heading">POPULAR ARTICLES</div></a>
                <div class="blog-artical-text">
                    <a href="story1">
                        <p><i class="fa fa-star" aria-hidden="true"></i> Role of Active Parenting in Child's Learning & Development</p>
                    </a>
                    <a href="story2">
                        <p><i class="fa fa-star" aria-hidden="true"></i> Benefits of everyday value-added talks between parent and children</p>
                    </a>

                </div>
            </div>


        </div>
    </div>

@endsection

@push('script')

@endpush
