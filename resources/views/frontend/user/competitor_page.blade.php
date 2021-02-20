@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="" style="padding-left: 20px;padding-right:20px;">
                    <div class="exploreBody">
                        <div class="card">
                            <div class="card-body">
                                Hello
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
