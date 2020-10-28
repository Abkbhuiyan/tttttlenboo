
@extends('layouts.app')
@section('title','Reservation')

@push('css')

    <link  rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">


@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}}" class="btn btn-primary">Add New Reservation</a>
                      @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Reservation</h4>

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
                                      Phone
                                    </th>
                                    <th>
                                       Email
                                    </th>
                                    <th>
                                        Date and Time
                                    </th>
                                    <th>
                                      Message
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                       Created at
                                    </th>

                                    <th>
                                       Updated at
                                    </th>
                                    <th>
                                       Action
                                    </th>
                                    </thead>
                                    <tbody>
                                      @foreach($reservation as $key=>$reservation)
                                          <tr>
                                              <td>{{$key +1 }}</td>
                                              <td>{{$reservation->name}}</td>
                                              <td>{{$reservation->phone}}</td>
                                              <td>{{$reservation->email}}</td>
                                              <td>{{$reservation->date_and_time}}</td>
                                              <td>{{$reservation->message}}</td>
                                              <td>
                                                  @if($reservation->status==true)
                                                      <span class="label label-info">Confirm</span>

                                                  @else
                                                     <span class="label label-danger">Not Confirm yet</span>

                                                  @endif
                                              </td>
                                              <td>{{$reservation->created_at }}</td>
                                              <td>{{$reservation->updated_at }}</td>
                                              <td>
                                                  @if($reservation->status==false)

                                                      <form id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" style="display: none;" method="POST">
                                                          @csrf

                                                      </form>
                                                      <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone.?')){
                                                          event.preventDefault();
                                                          document.getElementById('status-form-{{$reservation->id}}').submit();
                                                          }else {
                                                          event.preventDefault();
                                                          }"><i class="material-icons">done</i></button>

                                                  @else
                                                  <form id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display: none;" method="POST">
                                                     @csrf
                                                      @method('DELETE')
                                                  </form>
                                                  <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure went to delete?')){
                                                      event.preventDefault();
                                                      document.getElementById('delete-form-{{$reservation->id}}').submit();
                                                  }else {
                                                      event.preventDefault();
                                                      }"><i class="material-icons">delete</i></button>

                                                  @endif
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
