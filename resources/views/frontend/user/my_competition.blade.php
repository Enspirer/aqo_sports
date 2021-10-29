@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">

        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">

            @if(count($my_competitions) == 0)
                <div class="container" style="text-align: center;">
                    <div class="think-image">
                        <form method="get" action="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}">
                            <img src="http://localhost:8000/aqo_se/assets/image/think-image-2.png" alt="">
                            <h1>looks a little bit <br> empty here!</h1>
                            <p>No competitions found, Do you <br> want to explorer new competitions?</p>
                            <button>Find competitions</button>
                        </form>
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

    </div>
@endsection
