@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/about_us.css') }}">
@endpush


@section('content')

<div class="container-fluid p-0 banner">
    <div class="container">
        <div class="row">
            <div class="col-8" style="padding-top: 11rem">
                <h1 style="font-size: 70px;">Latest {{$blog->category}} Details</h1>
            </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h3>{{$blog->title}}</h3>
            <p style="font-size:14px">Category: {{$blog->category}}  &nbsp;&nbsp;&nbsp; Created Date: {{ $blog->created_at->format('d M Y') }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <img src="{{url('files/blog',$blog->feature_image)}}" class="mt-4" width="95%" />
        </div>
        <div class="col-6">
            <p>{!!$blog->description!!}</p>
        </div>
    </div>
</div>
@endsection
