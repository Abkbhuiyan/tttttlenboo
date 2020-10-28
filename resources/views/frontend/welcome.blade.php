@extends('frontend.app')
@section('title','Learn Engage Bond')

@push('css')
 <style>
     body {
         background-color: #30b3f2;
     }
     h1 {
         color: #fff;
     }
     section {
         padding-top: 2em;
         padding-bottom: 2em;
     }
     section h1 {
         margin-bottom: 1em;
     }
     section img {
         border: #ddd solid 1px;
         border-radius: 5px;
     }
     #homeVideo button.btn.btn-default {
         background: black;
         border-radius: 50%;
         position: absolute;
         right: 0;
         z-index: 5;
         color: white;
     }
 </style>
@endpush

@section('content')

    <!-- End Blog Area -->
    @include('frontend.partial.slider')
    @include('frontend.partial.sample_video')
    @include('frontend.partial.price');
    <!-- End our Class Area -->


    <!-- Start upcomming Area -->
    @include('frontend.partial.event')
@endsection

@push('script')


@endpush
