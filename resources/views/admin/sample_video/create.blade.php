
@extends('layouts.app')
@section('title','Video-Create')

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
                           <form action="{{route('sampleVideo.store')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="bmd-label-floating">video Name</label>
                                       <input type="text" class="form-control" name="name">
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label class="bmd-label-floating">Category</label>

                                             <select class="form-control" name="category">
                                                 <option>Select Category</option>
                                                 @foreach($categories as $key=>$category)

                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                 @endforeach

                                             </select>

                                       </div>
                                   </div>
                               </div>


                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label class="bmd-label-floating">Description</label>

                                           <textarea type="text" name="description" class="form-control">

                                           </textarea>

                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label class="bmd-label-floating">Price</label>

                                           <input type="number" class="form-control" name="price">

                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <label class="bmd-label-floating">Thumbnail</label>
                                       <input type="file" name="thumbnail">

                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-12">
                                       <label class="bmd-label-floating">Video</label>
                                       <input type="file" name="image">

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
