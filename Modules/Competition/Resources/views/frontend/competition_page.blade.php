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
                    <ul class="nav-list" id="myTab" role="tablist">
                        <li class="nav-item" id="home-tab">
                            About
                            <span class="border" style="display: none; left: 0px;"></span>
                        </li>
                        <li class="nav-item"  id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            Rules
                            <span class="border" style="display: none; left: 0px;"></span>
                        </li>
                        <li class="nav-item">
                            Organizer
                            <span class="border" style="display: none; left: 0px;"></span>
                        </li>
                        <li class="nav-item">
                            Payments
                            <span class="border" style="display: none; left: 0px;"></span>
                        </li>
                        <li class="nav-item">
                            Voting
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            Leaderboard
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            Competitors
                            <span class="border"></span>
                        </li>
                        <li class="nav-item">
                            Judge Panel
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
                        <h2>{{$competition_details->competition_name}}</h2>
                        <h6>{{$userDetails->first_name}} {{$userDetails->last_name}} - {{$start_date}}</h6>
                        <p>{!! $competition_details->description !!}</p>

                    </div>
                    <div class="rightSide col-md-4">
                        <div class="dateForm">
                            <div class="container">
                                <div class="dateForm">
                                    <div class="countDown row">
                                        <!-- <div class="time">
                                          <h4>Days</h4>
                                          <h3 id="days">6</h3>
                                        </div>
                                        <div class="time">
                                          <h4>Hours</h4>
                                          <h3 id="hours">10</h3>
                                        </div>
                                        <div class="time">
                                          <h4>Mins</h4>
                                          <h3 id="minutes">44</h3>
                                        </div>
                                        <div class="time">
                                          <h4>Second</h4>
                                          <h3 id="seconds">44</h3>
                                        </div> -->
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
                        </div>


                        @auth()

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


