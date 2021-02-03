@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="main">
        <div class="competetionHero">
            <div class="container">
                <div class="row">
                    <div class="imgaeSection col-md-10">
                        <div class="" style="background-image: url('{{url('/files/').'/'.$competition_details->feature_image}}');height: 100%"></div>
                    </div>
                    <div class="addSection col-md-2">
                        <img src="{{url('/img/frontend/verticle.jpg')}}" alt="" srcset="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="secondNavigation">
            <nav>
                <div class="nav">
                    <ul class="nav-list nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                               aria-selected="true">About</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-rules-tab" data-toggle="tab" href="#nav-rules" role="tab" aria-controls="nav-rules"
                               aria-selected="false">Rules</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-organizer-tab" data-toggle="tab" href="#nav-organizer" role="tab" aria-controls="nav-organizer"
                               aria-selected="false">Organizer</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-payments-tab" data-toggle="tab" href="#nav-payments" role="tab" aria-controls="nav-payments"
                               aria-selected="false">Payments</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-voting-tab" data-toggle="tab" href="#nav-voting" role="tab" aria-controls="nav-voting"
                               aria-selected="false">Voting</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-leaderboard-tab" data-toggle="tab" href="#nav-leaderboard" role="tab" aria-controls="nav-leaderboard"
                               aria-selected="false">Leaderboard</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-competitors-tab" data-toggle="tab" href="#nav-competitors" role="tab" aria-controls="nav-competitors"
                               aria-selected="false">Competitors</a>
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            <a id="nav-judge-tab" data-toggle="tab" href="#nav-judge" role="tab" aria-controls="nav-judge"
                               aria-selected="false">Judge Panel</a>
                            <span class="border"></span>
                        </li>
                    </ul>
                </div>
            </nav>
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
                            <div class="tab-pane fade" id="nav-organizer" role="tabpanel" aria-labelledby="nav-organizer-tab">...</div>
                            <div class="tab-pane fade" id="nav-payments" role="tabpanel" aria-labelledby="nav-payments-tab">...</div>
                            <div class="tab-pane fade" id="nav-voting" role="tabpanel" aria-labelledby="nav-voting-tab">...</div>
                            <div class="tab-pane fade" id="nav-leaderboard" role="tabpanel" aria-labelledby="nav-leaderboard-tab">...</div>
                            <div class="tab-pane fade" id="nav-competitors" role="tabpanel" aria-labelledby="nav-competitors-tab">...</div>
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
                                <div class="container">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Register Competition
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="" id="fb-render">

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseauth
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
                                                <form>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email / Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                                                    <p>Not a member yet? <a>Register Now</a></p>
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
    @endpush









    @if($is_closed == 'Open')
        <script>
            // time countdown
            const daysEl = document.getElementById("days");
            const hoursEl = document.getElementById("hours");
            const minutesEl = document.getElementById("minutes");
            const secondsEl = document.getElementById("seconds");
            const date = "13 feb 2021";

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

