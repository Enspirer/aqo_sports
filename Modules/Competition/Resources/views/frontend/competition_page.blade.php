@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/competition_page.css') }}">
@endpush


@push('after-styles')

<style>
    .scroll {
        overflow-y: hidden;
        overflow-x: scroll;
    }
    .scroll ::-webkit-scrollbar {
        width: 4px;
        border: 1px solid #00000000;
    }
    .scroll ::-webkit-scrollbar-track {
        border-radius: 0;
        background: #00000000;
    }
    .scroll ::-webkit-scrollbar-thumb {
        border-radius: 0;
        background: #35495E;
    }
    #nav-voting .table td, #nav-voting .table th {
    vertical-align: middle!important;
    text-align: center;
    }

</style>


@endpush


@section('content')
    <div class="main">
        <div class="competetionHero">
            <div class="container">
                <div class="row">
                    <div class="imgaeSection col-md-10">
                        <div class="main-image" style="background-image: url('{{url('/files/').'/'.$competition_details->feature_image}}');height: 30rem; background-size: cover"></div>

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
                        @if($competitionpagead != null)
                        <a href="{{$competitionpagead->link}}" target="_blank" >
                            <img src="{{url('files/advertisement',$competitionpagead->image)}}" alt="" class="w-100" style="height: 30rem; object-fit: cover">
                        </a>
                        @else
                            <img src="{{url('img/no-image.jpg')}}" alt="" class="w-100" style="height: 30rem; object-fit: cover">
                        @endif
                    </div>

                </div>
            </div>
        </div>
        
        <div class="competetionDetails">
            <div class="container px-4 px-md-3">
                <div class="row">
                    <div class="leftSide col-12 col-md-8 mb-5 mb-md-0">
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
                                <div class="text-center" style="border-style:dashed;padding: 10px;border-color: grey;">
                                    <img src="{{ url('aqo_se/assets/image/think-image-2.png') }}" alt="">
                                    <h2 style="color: grey;text-align: center">This feature is currently not available</h2>
                                    <p style="text-align: center;font-size: 21px;color: gray;">Our team is working on few improvements <br> Please check again later.</p>
                                </div>

                            </div>
                            
                            <div class="tab-pane fade" id="nav-voting" role="tabpanel" aria-labelledby="nav-voting-tab">

                                @if(count($getCompetitorDetails) == 0)

                                    <div class="think-image text-center" style="border-style:dashed;padding: 10px;border-color: grey;">
                                        <img src="{{ url('aqo_se/assets/image/think-image-2.png') }}" alt="">
                                        <h3 style="padding-top: 5px;color: grey;text-align: center">Competitors are not registered</h3>
                                    </div>

                                @else

                                    <table class="table table-hover">
                                        <thead>
                                        <tr class="align-items-center">
                                            <th scope="col">Competitor Name</th>
                                            <th scope="col">Vote Count</th>
                                            <th scope="col">Performance</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($getCompetitorDetails as $competiotrDetail)
                                            @if(is_performed($competiotrDetail['competitor_id'], $competition_details->id))
                                                <form action="{{ route('frontend.competition_page_voting') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <tr>
                                                        <td>{{$competiotrDetail['competitor_name']}}</td>
                                                        <td>{{$competiotrDetail['votes']}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#performanceModal" onclick="view({{$competiotrDetail['competitor_id']}})">View</button></td>
                                                        <td>
                                                            @auth
                                                                @if(is_voted($competiotrDetail['competitor_id'], $competition_details->id))
                                                                    <button type="submit" class="btn btn-primary" disabled>Voted</button>
                                                                @else
                                                                    <button type="submit" class="btn btn-primary">Vote Now</button>
                                                                @endif
                                                            @else
                                                                <a href="{{ route('frontend.auth.login') }}" type="button" class="btn btn-primary">Vote Now</a>
                                                            @endauth
                                                        </td>

                                                        <input type="hidden" name="competitor_id" value="{{$competiotrDetail['competitor_id']}}">
                                                        <input type="hidden" name="competition_id" value="{{ $competition_details->id }}">
                                                    </tr>
                                                </form>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif
                            </div>

                            <div class="tab-pane fade" id="nav-leaderboard" role="tabpanel" aria-labelledby="nav-leaderboard-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card scroll" style="padding: 10px;" >
                                            <table id="myTablePrihlasky" class="table table-hover table-bordered table-condensed ">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="titulka" style="width:30px">Final</th>
                                                        <th rowspan="2" class="titulka" style="width:50px">Place</th>
                                                        <th rowspan="2" class="titulka" style="width:70px">Country</th>
                                                        <th rowspan="2" class="titulka">Name/Club</th>
                                                        <th rowspan="2" class="titulka" style="width:50px; border-right:1px solid gray">Year</th>
                                                        @foreach($roundSection as $roundSectioenn)
                                                            <th colspan="{{count($markSection)}}" style="text-align:center; border-right:1px solid gray">
                                                                {{$roundSectioenn}}
                                                            </th>
                                                        @endforeach

                                                        <th rowspan="2" class="titulka" style="width:50px ; border-right:1px solid gray">Score</th>
                                                    </tr>

                                                    <tr>
                                                        @foreach($roundSection as $roundSectioenn)
                                                            @foreach($markSection as $markSectionItem)
                                                                <th class="titulka" style="width:50px">{{$markSectionItem}}</th>
                                                            @endforeach
                                                        @endforeach
                                                    </tr>
                                                </thead>


                                                <tbody id="tBodyFinale">
                                                    <tr>
                                                        <tr>
                                                            @foreach($competitor_details as $competitor_detail)

                                                                <td rowspan="2">1</td>
                                                                <td rowspan="2" style="text-align:center;font-size:15px; ">1.</td>
                                                                <td rowspan="2"><img onerror="$(this).hide()" style="width:20px" src="flags/USA.png">{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->country}}</td>
                                                                <td rowspan="2">{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->first_name}} {{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->last_name}}</td>
                                                                <td rowspan="2" style="text-align:center; border-right:1px solid gray;">{{ date_format($competitor_detail->created_at,'Y') }}</td>

                                                                @foreach($roundSection as $deround_details)
                                                                    <td colspan="{{count($markSection)}}" style="text-align:center;font-size:12px; border-right:1px solid gray; ">
                                                                        <b>{{round_total($competitor_detail->id,$deround_details,$deround_details)}}</b>
                                                                        <div style="float:right; font-size:10px">{{\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitor_detail->id)->where('competition_id',$competitor_detail->competition_id)->where('round_name',$deround_details)->count()}}</div>
                                                                    </td>
                                                                @endforeach


                                                                <td rowspan="2" style="text-align:center;font-size:14px; border-right:1px solid gray;">
                                                                    <b>{{get_competitor_all_score($competitor_detail->id)}}</b>
                                                                </td>
                                                                <tr>
                                                                    @foreach($roundSection as $oulem)

                                                                        @foreach($markSection as $markSectionItem)
                                                                            <td style="text-align:center;font-size:12px;">{{judge_marks_total($competitor_detail->id,$markSectionItem,$oulem)}}</td>
                                                                        @endforeach
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                        </tr>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            @if(count($competitor_details) == 0)

                                                <div class="think-image text-center">
                                                    <img src="{{ url('aqo_se/assets/image/think-image-2.png') }}" alt="">
                                                    <h3 style="padding-top: 5px;color: grey;text-align: center">Competitors are not registered</h3>
                                                </div>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-competitors" role="tabpanel" aria-labelledby="nav-competitors-tab">

                                @if(count($getCompetitorDetails) == 0)

                                    <div class="think-image text-center" style="border-style:dashed;padding: 10px;border-color: grey;">
                                        <img src="{{ url('aqo_se/assets/image/think-image-2.png') }}" alt="">
                                        <h3 style="padding-top: 5px;color: grey;text-align: center">Competitors are not registered</h3>
                                    </div>

                                @else
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Competitor Name</th>
                                            <th scope="col">Score</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($getCompetitorDetails) == 0)


                                        @else
                                            @foreach($getCompetitorDetails as $getCompetitor)
                                                <tr>
                                                    <td scope="row">{{$getCompetitor['competitor_name']}}</td>
                                                    <!-- <td>{{$getCompetitor['score']}}</td> -->
                                                    <td>{{ get_competitor_all_score($getCompetitor['competitor_id']) }}</td>

                                                </tr>
                                            @endforeach
                                        @endif


                                        </tbody>

                                    </table>
                                @endif
                                
                            </div>

                            <div class="tab-pane fade" id="nav-judge" role="tabpanel" aria-labelledby="nav-judge-tab">

                                @if(count($judges) == 0)

                                    <div class="think-image text-center" style="border-style:dashed;padding: 10px;border-color: grey;">
                                        <img src="{{ url('aqo_se/assets/image/think-image-2.png') }}" alt="">
                                        <h3 style="padding-top: 5px;color: grey;text-align: center">Judges are not registered</h3>
                                    </div>

                                @else

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Judge Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($judges as $judge)
                                            <tr>
                                                <td>{{ App\Models\Auth\User::where('id', $judge->user_id)->first()->first_name}} {{ App\Models\Auth\User::where('id', $judge->user_id)->first()->last_name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="rightSide col-md-4">
                        @if($is_closed == 'Open')
                            <div class="dateForm">
                                <div class="container">
                                    <div class="dateForm">
                                        <div class="countDown row">
                                        </div>
                                        <div class="ocl-timer">
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
                        @else
                        <div class="container">
                            <div class="card border-0" style="padding: 40px; box-shadow: 0px 5px 10px #00000029;">
                                <div class="btn btn-danger" disabled>Event Closed</div>
                            </div>
                        </div>
                            
                        @endif
                                        
                                        

                        @auth()

                            <div class="loginFormComp">
                                <div class="container">
                                    @if($competitorDetails)
                                        <button type="button" class="btn-apply-now" disabled>
                                            Competition Applied
                                        </button>
                                    @else
                                        @if($is_closed == 'Open')
                                            <button type="button" class="btn-apply-now" data-toggle="modal" data-target="#exampleModal">
                                                Register Competition
                                            </button>
                                        @endif
                                    @endif
                                    @if(is_judge(auth()->user()->id))
                                        @if(is_judge_applied(auth()->user()->id, $competition_details->id))
                                            @if(is_judge_applied_approved(auth()->user()->id, $competition_details->id))
                                                <a href="{{ route('frontend.user.show_judgment', $competition_details->id) }}" type="button" class="btn-become-judge text-center">
                                                    My Judge
                                                </a>
                                            @else
                                                <button type="button" class="btn-become-judge" disabled>
                                                    Judge Applied
                                                </button>
                                            @endif
                                        @else
                                            @if($is_closed == 'Open')
                                                <button type="button" class="btn-become-judge" data-toggle="modal" data-target="#judgeDialog">
                                                    Become a Judge
                                                </button>
                                            @endif
                                        @endif
                                    @endif
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
                                                    <a href="{{ route('frontend.auth.password.reset') }}" class="text-right"><p>Forget Password?</p></a>
                                                </div>

                                                <div class="bottumText mt-2">
                                                    <p>Not a member yet? <a href="{{route('frontend.auth.register')}}">Register Now</a></p>
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


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-toggle="modal" data-target="#voteModal"></button>

        <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-3 text-center">Voted successfully.</h4>
                        <h5>You voted for {{ App\Models\Auth\User::where('id', session('competitor'))->first()->first_name }} {{ App\Models\Auth\User::where('id', session('competitor'))->first()->last_name }} under this {{ $competition_details->competition_name }} competition.</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(\Session::has('competition_applied'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="competition-btn" data-toggle="modal" data-target="#CompetitionModal"></button>

        <div class="modal fade" id="CompetitionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your request. We will check and approve as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(\Session::has('judge_applied'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="judge-btn" data-toggle="modal" data-target="#JudgeModal"></button>

        <div class="modal fade" id="JudgeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your request. We will check and approve as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="modal fade" id="performanceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Performance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body performance">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("competition-btn")){
            $('#competition-btn').click();
        }
    </script>

    <script>
        if(document.getElementById("judge-btn")){
            $('#judge-btn').click();
        }
    </script>


    <script>
        function view(id) {
 
            var settings = {
                "url": "{{url('/')}}/api/competitor-performance/" + id,
                "method": "GET",
                "timeout": 0,
                "dataType": "json",
                };

            $.ajax(settings).done(function (response) {
                

                let count = 0;
                
                response.forEach(res => {

                    let round = res['round_name'];
                    let video = res['performance_link'].replace('watch?v=', 'embed/');
                    let description = res['performance_description'];

                    let template = `<div id="accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_${count}" aria-expanded="true" aria-controls="collapseOne">
                                                                ${round}
                                                            </button>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="collapse_${count}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            
                                                            <iframe id="myframe" type="text/html" width="100%" src="${video}" frameborder="0" style="height: 280px;"></iframe>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3>Description</h3> <br>
                                                            <p>${description}</p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                    count++;

                    $('.performance').append(template);
                });

                
                // getDetails = response['performance_link'].replace('watch?v=', 'embed/');
                
                // document.getElementById("myframe").src = getDetails;
                
            });
        };

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


