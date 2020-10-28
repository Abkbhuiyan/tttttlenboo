
@extends('layouts.app')
@section('title','Category-Create')

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
                            <h4 class="card-title ">Add New Create</h4>

                        </div>
                        <div class="card-body">
                           <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="bmd-label-floating">Nmae</label>
                                       <input type="text" class="form-control" name="name">
                                   </div>

                               </div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <label class="bmd-label-floating">Image</label>
                                       <input type="file" name="image">

                                   </div>
                               </div>




                               <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>

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
