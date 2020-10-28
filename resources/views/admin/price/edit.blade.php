
@extends('layouts.app')
@section('title','Price-Edit')

@push('css')




@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Price</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('price.update',$price->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Package Name</label>
                                        <input type="text" class="form-control" name="package_name" value="{{$price->package_name}}">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Network</label>

                                            <textarea type="text" name="network" class="form-control" >
                                              {{ $price->network }}
                                           </textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image" value="{{$price->image}}">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>

                                            <input type="number" class="form-control" name="price" value="{{$price->price}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Days</label>

                                            <input type="text" class="form-control" name="days" value="{{$price->days}}">

                                        </div>
                                    </div>
                                </div>


                                <a href="{{route('price.index')}}" class="btn btn-danger">Back</a>

                                <button class="btn btn-primary" type="submit">Save</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('script')



@endpush
