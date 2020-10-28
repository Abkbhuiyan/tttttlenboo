
@extends('layouts.app')
@section('title','Edit-Info')

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
                            <h4 class="card-title ">Add New Item</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('settings.update',$settings->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Company Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$settings->name}}">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image" value="{{$settings->image}}">

                                    </div>
                                </div>
                                <a href="{{route('settings.index')}}" class="btn btn-danger">Back</a>

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
