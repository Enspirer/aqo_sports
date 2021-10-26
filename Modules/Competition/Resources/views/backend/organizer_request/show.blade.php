@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="card" style="padding-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$user_details->first_name}} {{$user_details->last_name}}</h4>
                            <p>
                                <strong>Email:</strong> {{$user_details->email}} <br>
                                <strong>User ID:</strong> {{$user_details->id}} <br>
                                <strong>Organizer Name:</strong> {{$organizer_details->organization}}<br>
                                <strong>Phone number:</strong> {{$organizer_details->contact_details}}
                                <br>
                                <strong>Address:</strong> {{$organizer_details->address}} <br>
                                <strong>Country:</strong> {{$organizer_details->country}}
                            </p>



                            @if($organizer_details->status == 1)
                                <div class="" style="padding: 10px;background-color: greenyellow;">
                                    This User Activated to Organizer Permissions
                                </div>
                            @else
                                <div class="" style="padding: 10px;background-color: palevioletred;">
                                    This User Deactivated to Organizer Permissions
                                </div>
                            @endif


                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <form  action="{{route('admin.competition.organizer_request.update')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$organizer_details->id}}">

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{$organizer_details->status == 1 ? "selected" : "" }}> Approve</option>
                                <option value="0" {{$organizer_details->status == 0 ? "selected" : "" }}> Deactivate</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
