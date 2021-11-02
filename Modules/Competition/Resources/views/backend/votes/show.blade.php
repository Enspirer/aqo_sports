@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="card" style="padding-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">{{$judge_details->judge_name}}</h4>
                            <div class="mb-4">
                                <p><strong>Email:</strong> {{$user_details->email}}</p>
                                <p><strong>User ID:</strong> {{$user_details->id}}</p>
                                <p><strong>Institute:</strong> {{$judge_details->institute}}</p>
                                <p><strong>Introduction:</strong> {{$judge_details->introduction}}</p>
                                <p><strong>Skills:</strong> {{$judge_details->skills}}</p>
                                <p><strong>ID Card:</strong></p> <img src="{{ url('files/judge_form',$judge_details->id_card) }}" width="20%" />
                            </div>

                            @if($judge_details->status == 'Approved')
                                <div class="" style="padding: 10px;background-color: greenyellow;">
                                    This User Activated to Judge Permissions
                                </div>
                            @else
                                <div class="" style="padding: 10px;background-color: palevioletred;">
                                    Pending to Judge Permissions
                                </div>
                            @endif


                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <form  action="{{route('admin.become_judge.update')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$judge_details->id}}">

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="Pending" {{$judge_details->status == 'Pending' ? "selected" : "" }}> Pending</option>
                                <option value="Approved" {{$judge_details->status == 'Approved' ? "selected" : "" }}> Approved</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
