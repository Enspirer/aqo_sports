@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">

        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">

            @if(count($my_competitions) == 0)
                <div class="contentExplore">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="padding: 10px">
                                    <h3 style="text-align: center">Competitor</h3>
                                    <div class="" style="background-image: url('{{url('aqo_se/assets/image/comp.svg')}}');height: 110px;background-size: contain;background-repeat: no-repeat;background-position: center;margin-bottom: 30px;margin-top: 30px;"></div>
                                    <p>Please select the competition that you would like take a part</p><br>
                                    <div class="think-image" style="text-align: center">
                                        <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}"  class="btn btn-primary"  style="background-color:gold;font-size: 21px;padding: 10px;padding-left: 20px;padding-right: 20px;color: black;">Find competitions</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="padding: 10px">
                                    <h3 style="text-align: center">Judge</h3>
                                    <div class="" style="background-image: url('{{url('aqo_se/assets/image/judge.svg')}}');height: 110px;background-size: contain;background-repeat: no-repeat;background-position: center;margin-bottom: 30px;margin-top: 30px;"></div>
                                    <p>Please select the competition that you would like to judge by exploring competitions</p>
                                    <div class="think-image">
                                        <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}" class="btn btn-primary" style="background-color:gold;font-size: 21px;padding: 10px;padding-left: 20px;padding-right: 20px;color: black;">Register as Judge</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="padding: 10px">
                                    <h3 style="text-align: center">Create an Event</h3>
                                    <div class="" style="background-image: url('{{url('aqo_se/assets/image/event.svg')}}');height: 110px;background-size: contain;background-repeat: no-repeat;background-position: center;margin-bottom: 30px;margin-top: 30px;"></div>
                                    <p>If you would like to join as an organizer</p><br>
                                    <div class="think-image" style="text-align: center">
                                        <a href="{{route('frontend.user.register_as_organizer')}}"  class="btn btn-primary"  style="background-color:gold;font-size: 21px;padding: 10px;padding-left: 20px;padding-right: 20px;color: black;">Create an Event</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="padding: 10px">
                                    <h3 style="text-align: center">Vote for Event</h3>
                                    <div class="" style="background-image: url('{{url('aqo_se/assets/image/vote.svg')}}');height: 110px;background-size: contain;background-repeat: no-repeat;background-position: center;margin-bottom: 30px;margin-top: 30px;"></div>
                                    <p>if you would like to vote</p><br><br>
                                    <div class="think-image" style="text-align: center">
                                        <a href="{{route('frontend.user.register_as_organizer')}}"  class="btn btn-primary"  style="background-color:gold;font-size: 21px;padding: 10px;padding-left: 20px;padding-right: 20px;color: black;">Vote Competition</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="contentExplore">
                    <div class="container">
                        <div class="exploreBody">
                            <div class="row">
                                @foreach($my_competitions as $my_competition)
                                    <div class="imageCard col-md-3 col-sm-6 col-xs-12">
                                        <a href="{{route('frontend.user.performance_page',$my_competition['id'])}}">
                                            <div class="imageSize">
                                                <img src="{{url('files/'.$my_competition['feature_image'])}}" alt="" srcset="">
                                            </div>
                                        </a>
                                        <div class="container">
                                            <div class="nameCard">
                                                <h4>{{$my_competition['competition_name']}}</h4>
                                                <p>Virtual Tournament</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="addSectionHorizantle">
                                <div class="container">
                                    <img src="assets/image/5e67b03c59a90_thumb900.jpg" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



        </div>
@endsection
