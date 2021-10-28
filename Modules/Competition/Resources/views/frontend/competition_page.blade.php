@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="main">
        <div class="competetionHero">
            <div class="container">
                <div class="row">
                    <div class="imgaeSection col-md-10">
                        <div class="" style="background-image: url('{{url('/files/').'/'.$competition_details->feature_image}}');height: 30rem; background-size: cover"></div>

                        <div class="secondNavigation">
                            <nav>
                                <div class="nav">
                                    <ul class="nav-list nav" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                                            aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="nav-rules-tab" data-toggle="tab" href="#nav-rules" role="tab" aria-controls="nav-rules"
                                            aria-selected="false">Rules</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="nav-organizer-tab" data-toggle="tab" href="#nav-organizer" role="tab" aria-controls="nav-organizer"
                                            aria-selected="false">Organizer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="nav-payments-tab" data-toggle="tab" href="#nav-payments" role="tab" aria-controls="nav-payments"
                                            aria-selected="false">Payments</a>
                                        </li>
                                        @if($categoryDetails->vote_function == 0)

                                        @else
                                            <li class="nav-item">
                                                <a id="nav-voting-tab" data-toggle="tab" href="#nav-voting" role="tab" aria-controls="nav-voting"
                                                aria-selected="false" style="">Voting</a>
                                            </li>
                                        @endif

                                        <li class="nav-item">
                                            <a id="nav-leaderboard-tab" data-toggle="tab" href="#nav-leaderboard" role="tab" aria-controls="nav-leaderboard"
                                            aria-selected="false">Leaderboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="nav-competitors-tab" data-toggle="tab" href="#nav-competitors" role="tab" aria-controls="nav-competitors"
                                            aria-selected="false">Competitors</a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="nav-judge-tab" data-toggle="tab" href="#nav-judge" role="tab" aria-controls="nav-judge"
                                            aria-selected="false" class="">Judge Panel</a>
                                        </li>
                                    </ul>
                                </div>

                                <hr class="m-0">
                                
                            </nav>
                        </div>
                    </div>
                    <div class="addSection col-md-2">
                        <img src="{{url('img/frontend/vertical.png')}}" alt="" class="w-100" style="height: 30rem; object-fit:cover;"/>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="competetionDetails">
            <div class="container">
                <div class="row">
                    <div class="leftSide col-md-8">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="aboutÎ-tab">
                                <h2>{{$competition_details->competition_name}}</h2>
                                <h6>{{$userDetails->first_name}} {{$userDetails->last_name}} - {{$start_date}}</h6>
                                <p>{!! $competition_details->description !!}</p>
                            </div>
                            <div class="tab-pane fade" id="nav-rules" role="tabpanel" aria-labelledby="nav-rules-tab">
                                @foreach($gameRule as $rule)
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>{{$rule->rule_name}}</h4>
                                            <p>{{$rule->rule_description}}</p>
                                        </div>
                                    </div><br>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="nav-organizer" role="tabpanel" aria-labelledby="nav-organizer-tab">
                                @if($organizer_details == null)
                                    <div class="" style="border-style:dashed;padding: 10px;border-color: grey;">
                                        <h2 style="color: grey;text-align: center">Organizer Details Not Found</h2>
                                    </div>
                                @else
                                    <div class="card" style="padding: 10px">
                                        <h3>Organizer Name: {{$organizer_details->organization}}</h3><br>

                                        <div class="row">
                                            <div  class="col-md-6">
                                                <strong>Address:</strong> {{$organizer_details->address}}<br>

                                            </div>
                                            <div  class="col-md-6">
                                                <strong>Contact Number:</strong> {{$organizer_details->contact_details}}

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-payments" role="tabpanel" aria-labelledby="nav-payments-tab">
                                <div class="" style="border-style:dashed;padding: 10px;border-color: grey;">
                                    <h2 style="color: grey;text-align: center">This feature is currently not available</h2>
                                    <p style="text-align: center;font-size: 21px;color: gray;">Our team is working on few improvements <br> Please check again later.</p>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-voting" role="tabpanel" aria-labelledby="nav-voting-tab">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Competitor Name</th>
                                        <th scope="col">Vote Count</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getCompetitorDetails as $competiotrDetail)
                                        <tr>
                                            <td>{{$competiotrDetail['competitor_name']}}</td>
                                            <td>{{$competiotrDetail['votes']}}</td>
                                            <td>
                                                <button class="btn btn-primary">Vote Now</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-leaderboard" role="tabpanel" aria-labelledby="nav-leaderboard-tab">
                                @include('competition::frontend.include.leaderboard')
                            </div>
                            <div class="tab-pane fade" id="nav-competitors" role="tabpanel" aria-labelledby="nav-competitors-tab">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Competitior Name</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($getCompetitorDetails) == 0)


                                    @else
                                        @foreach($getCompetitorDetails as $getCompetitor)
                                            <tr>
                                                <td scope="row">{{$getCompetitor['competitor_name']}}</td>
                                                <td>{{$getCompetitor['score']}}</td>

                                            </tr>
                                        @endforeach
                                    @endif


                                    </tbody>

                                </table>
                                @if(count($getCompetitorDetails) == 0)
                                    <div>
                                        <td style="text-align: center">
                                            <h3 style="padding-top: 5px;color: grey;text-align: center">Competitor not registed</h3>
                                        </td>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-judge" role="tabpanel" aria-labelledby="nav-judge-tab">...</div>
                        </div>
                    </div>
                    <div class="rightSide col-md-4">
                        <div class="dateForm">
                            <div class="container">
                                <div class="dateForm">
                                    <div class="countDown row">
                                    </div>
                                    <div class="ocl-timer">
                                        @if($is_closed == 'Open')
                                            <div class="ocl-timer__main-unit-amount">
                                                <span id="days">22</span>
                                            </div>
                                            <div class="ocl-timer__timer-details">
                                                <div class="ocl-timer__main-unit">Days</div>
                                                <div class="ocl-timer__secondary-units">
                                                    <div class="ocl-timer__secondary-unit">
                                                        <div class="ocl-timer__secondary-unit-name">
                                                            Hours
                                                        </div>
                                                        <div class="ocl-timer__secondary-unit-amount">
                                                            <span id="hours">14</span>
                                                        </div>
                                                    </div>
                                                    <div class="ocl-timer__secondary-units-divider">
                                                        :
                                                    </div>
                                                    <div class="ocl-timer__secondary-unit">
                                                        <div class="ocl-timer__secondary-unit-name">
                                                            Mins
                                                        </div>
                                                        <div class="ocl-timer__secondary-unit-amount">
                                                            <span id="minutes">15</span>
                                                        </div>
                                                    </div>
                                                    <div class="ocl-timer__secondary-units-divider">
                                                        :
                                                    </div>
                                                    <div class="ocl-timer__secondary-unit">
                                                        <div class="ocl-timer__secondary-unit-name">
                                                            Second
                                                        </div>
                                                        <div class="ocl-timer__secondary-unit-amount">
                                                            <span id="seconds">57</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card">
                                                <div class="btn btn-danger">Event Closed</div>
                                            </div>
                                        @endif

                                    </div>
                                    <hr>
                                    <h3>Remaining to register</h3>
                                    <hr>
                                    <div class="dateRange" style="flex: auto">
                                        <h3>{{$start_date}}</h3><br>
                                        <p style="padding-left: 20px;padding-right: 20px;">To</p>
                                        <h3>{{$end_date}},</h3>
                                    </div>
                                </div>
                            </div>
                            @auth()

                            <div class="loginFormComp">
                                <div class="container">
                                    @if($competitorDetails)
                                        <button type="button" class="btn-apply-now" disabled>
                                            Applied Competition
                                        </button>
                                    @else
                                        <button type="button" class="btn-apply-now" data-toggle="modal" data-target="#exampleModal">
                                            Register Competition
                                        </button>
                                    @endif

                                        <button type="button" class="btn-become-judge" data-toggle="modal" data-target="#judgeDialog">
                                            Become a judge
                                        </button>
                                </div>
                            </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('frontend.register_request')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="exampleModalLabel">Competition Register</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="" id="fb-render">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="competition_id" value="{{$competition_details->id}}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Register</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Judgement Models -->
                                <div class="modal fade" id="judgeDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('frontend.register_judge')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="exampleModalLabel">Become a judge</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($competition_details->judge_register_form == null)
                                                        <div class="" style="text-align: center;color: grey">
                                                            <h3>Judge form not created</h3>
                                                        </div>

                                                    @else
                                                        <div class="" id="fb_judge_render">

                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="competition_id" value="{{$competition_details->id}}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>




                            @else
                                <div class="loginFormComp">
                                    <div class="container">
                                        <div class="loginFormComp">
                                            <div class="title">
                                                <h3>Welcome to AQOSE,</h3>
                                                <p>Please Sign In to continue</p>
                                            </div>
                                            <a href="" class="button button--facebook">Continue With Facebook</a>
                                            <a href="" class="button button--google">Continue With Google</a>

                                            <div class="separator">or</div>

                                            <div>
                                                <form action="{{route('frontend.auth.login.post')}}" method="post">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email / Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        Submit
                                                    </button>
                                                </form>
                                                <div class="row d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                                    </div>
                                                    <p class="text-right">Forget Password?</p>
                                                </div>

                                                <div class="bottumText">
                                                    <p>Not a member yet? <a href="">Register Now</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer_script')




        <script>
            /*
             This has been updated to use the new userData method available in formRender
             */
            const getUserDataBtn = document.getElementById("get-user-data");
            const fbRender = document.getElementById("fb-render");
            const originalFormData = {!! $competition_details->register_form !!};
            jQuery(function($) {
                const formData = JSON.stringify(originalFormData);

                $(fbRender).formRender({ formData });
                getUserDataBtn.addEventListener(
                    "click",
                    () => {
                        window.alert(window.JSON.stringify($(fbRender).formRender("userData")));
                    },
                    false
                );
            });
        </script>

    <script>
        /*
         This has been updated to use the new userData method available in formRender
         */
        const getUserDataBtnJudge = document.getElementById("get-user-data");
        const fbRendeJudger = document.getElementById("fb_judge_render");
        const originalFormDataJudge = {!! $competition_details->judge_register_form !!};
        jQuery(function($) {
            const formData = JSON.stringify(originalFormDataJudge);

            $(fbRendeJudger).formRender({ formData });
            getUserDataBtnJudge.addEventListener(
                "click",
                () => {
                    window.alert(window.JSON.stringify($(fbRender).formRender("userData")));
                },
                false
            );
        });
    </script>


    @endpush



    @if($is_closed == 'Open')
        <script>
            // time countdown
            const daysEl = document.getElementById("days");
            const hoursEl = document.getElementById("hours");
            const minutesEl = document.getElementById("minutes");
            const secondsEl = document.getElementById("seconds");
            const date = "{{$end_date}}";

            function countdown() {
                const newYearsDate = new Date(date);
                const currentDate = new Date();

                const totalSeconds = (newYearsDate - currentDate) / 1000;

                const days = Math.floor(totalSeconds / 3600 / 24);
                const hours = Math.floor(totalSeconds / 3600) % 24;
                const minutes = Math.floor(totalSeconds / 60) % 60;
                const seconds = Math.floor(totalSeconds) % 60;

                daysEl.innerHTML = formatTime(days);
                hoursEl.innerHTML = formatTime(hours);
                minutesEl.innerHTML = formatTime(minutes);
                secondsEl.innerHTML = formatTime(seconds);
            }
            function formatTime(time) {
                return time < 10 ? `0${time}`:time;
            }
            countdown();
            setInterval(countdown, 1000);
        </script>

    @else

    @endif


@endsection


