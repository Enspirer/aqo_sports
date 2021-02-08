@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">

        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <div class="exploreBody">
                        <div class="row">
                            @foreach($my_competitions as $my_competition)
                                <div class="imageCard col-md-3 col-sm-6 col-xs-12">
                                    <div class="imageSize">
                                        <img src="{{url('files/'.$my_competition['feature_image'])}}" alt="" srcset="">
                                    </div>
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
        </div>
@endsection
