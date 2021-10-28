@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                @include('includes.partials.messages')
                    <div class="exploreBody">
                        <div class="card">
                            <div class="container"><br>

                                @if($organizer_details == null)
                                    <form action="{{route('frontend.user.reuqst_organizer')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Organizer Name</label>
                                            <input type="text" class="form-control" name="organization" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="number" class="form-control" name="contact_details" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea type="number" class="form-control" name="address" rows="5" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" class="form-control" required>
                                                <option value="USA">USA</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="India">India</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Japan">Japan</option>
                                                <option value="China">China</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Register Organizer</button>
                                    </form>
                                @else
                                    @if($organizer_details->status == 1)
                                        @include('frontend.user.includes.orgz_competition_list')
                                    @else
                                        <div class="" style="text-align: center;margin-top: 20px;">
                                            <h3 style="text-align: center">Your request is successfully sent. <br> </h3>
                                            <p>You will be notified once the account is approved by AQOSE team..
                                            <h5 style="text-align: center">Thank you !</h5><br>

                                            <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}" class="btn btn-primary">Explore Events and Competition</a>
                                        </div>
                                    @endif

                                @endif


                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>



@foreach($competitions as $competition)
<!-- Modal -->
<div class="modal fade" id="deletecompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('frontend.user.destroy_competition',$competition->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove {{$competition->competition_name}} ?</h5>
                        </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endforeach

@endsection
