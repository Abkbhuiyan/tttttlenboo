
@extends('layouts.app')
@section('title','Sample_Videos')

@push('css')

    <link  rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">


@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('sampleVideo.create')}}" class="btn btn-primary">Add New Sample Video</a>
                      @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Videos</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%" >
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                       Thumbnail
                                    </th>
                                    <th>
                                        Category Name
                                    </th>
                                    <th>
                                      Description
                                    </th>

                                    <th>
                                       Price
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                    <th>
                                       Action
                                    </th>
                                    </thead>
                                    <tbody>
                                      @foreach($sample as $key=>$sample)
                                          <tr>
                                              <td>{{$key +1 }}</td>
                                              <td>{{$sample->name}}</td>
                                              <td>
                                                  <img src="{{asset('uploade/sample/thumbnail/'.$sample->thumbnail)}}" class="img-responsive img-thumbnail" style="height: 80px; width: 80px;">
                                              </td>
                                              <td>{{$sample->category->name}}</td>
                                              <td>{{$sample->description }}</td>
                                              <td>{{$sample->price }}</td>
                                              <td>{{$sample->created_at }}</td>
                                              <td>{{$sample->updated_at }}</td>
                                              <td>
                                                  <a href="{{route('sampleVideo.edit',$sample->id)}}" class="btn btn-info btn-sm">
                                                      <i class="material-icons">mode_edit</i>
                                                  </a>
                                                  <form id="delete-form-{{$sample->id}}" action="{{route('sampleVideo.destroy',$sample->id)}}" style="display: none;" method="POST">
                                                     @csrf
                                                      @method('DELETE')
                                                  </form>
                                                  <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure went to delete?')){
                                                      event.preventDefault();
                                                      document.getElementById('delete-form-{{$sample->id}}').submit();
                                                  }else {
                                                      event.preventDefault();
                                                      }"><i class="material-icons">delete</i></button>
                                              </td>
                                          </tr>

                                      @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('script')


    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
