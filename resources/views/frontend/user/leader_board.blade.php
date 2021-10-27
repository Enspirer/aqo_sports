@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')
        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">

                    <div class="think-image">
                        <form method="get" action="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}">
                            <div style="background: url('{{url('aqo_se/assets/image/notf.svg')}}');height: 100px;background-repeat: no-repeat;background-size: contain;background-position: center;margin-bottom: 10px;"></div>
                            <h1>This feature is currently not available</h1>
                            <p>Our team is working on few improvements</p>
                            <button>Find competitions</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
