@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">

        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <div class="exploreBody">
                            @if($getDetails)
                                <div class="row">
                                    @foreach($getDetails as $getDetail)
                                        <div class="imageCard col-md-3 col-sm-6 col-xs-12">
                                            <a href="">
                                                <div class="imageSize">
                                                    <img src="{{url('files/'.$getDetail['feature_image'])}}" alt="" srcset="">
                                                </div>
                                            </a>
                                            <div class="container">
                                                <div class="nameCard">
                                                    <h4>{{$getDetail['competition_name']}}</h4>
                                                    <p>Virtual Tournament</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="contentExplore">
                                    <div class="container">

                                        <div class="think-image">
                                            <form method="get" action="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}">
                                                <img src="{{url('aqo_se/assets/image/think-image-2.png')}}" alt="">
                                                <h1>looks a little bit <br> empty here!</h1>
                                                <p>No competitions found, Do you <br> want to explorer new competitions?</p>
                                                <button>Find competitions</button>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            @endif




                        <div class="addSectionHorizantle">
                            <div class="container">
                                <img src="assets/image/5e67b03c59a90_thumb900.jpg" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
