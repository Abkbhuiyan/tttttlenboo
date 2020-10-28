
@extends('layouts.app')
@section('title','Video-Edit')

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
                            <h4 class="card-title ">Add New Video</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('sampleVideo.update',$sample->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">video Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$sample->name}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>

                                            <select class="form-control" name="category">
                                                @foreach($categories as $key=>$category)
                                                    <option>Select Category</option>
                                                    <option {{$category->id==$sample->category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>

                                            <textarea type="text" name="description" class="form-control" >
                                              {{ $sample->description }}
                                           </textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>

                                            <input type="number" class="form-control" name="price" value="{{$sample->price}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image" value="{{$sample->image}}">

                                    </div>
                                </div>
                                <a href="{{route('sampleVideo.index')}}" class="btn btn-danger">Back</a>

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
