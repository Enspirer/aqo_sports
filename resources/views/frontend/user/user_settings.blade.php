@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')


    <style>
        .stage-wrap.empty{
            height: 520px;
        }
    </style>
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')
        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                @include('includes.partials.messages')
                    <div class="exploreBody px-4">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User Settings</strong>
                                    </div><!--card-header-->

                                    <div class="card-body p-4">
                                        @include('includes.partials.messages')
                                            <form action="{{route('frontend.user.user_settings_update')}}" method="post">
                                            {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" name="first_name" class="form-control" value="{{$user_details->first_name}}" placeholder="First Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" name="last_name" value="{{$user_details->last_name}}" class="form-control" placeholder="Last Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" value="{{$user_details->email}}" class="form-control form-inline" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" data-toggle="password" required>
                                                </div>

                                                <button type="submit" class="btn btn-success mt-3">Update</button>
                                            </form>
                                    </div>
                                </div><!--card-->
                            </div><!--col-->
                        </div><!--row-->


                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Modal delete -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>


    

@endsection
