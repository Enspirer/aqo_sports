@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/blog.css') }}">
@endpush


@section('content')

<div class="container-fluid p-0 banner mb-3">
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding-top: 3rem">
                <h1 style="font-size: 70px;">Latest {{$blog->category}} Details</h1>
            </div>
        </div>
    </div>
</div>


<div class="container blog">
    <div class="row">
        <div class="col-12">
            <h3>{{$blog->title}}</h3>
            <p class="mb-0" style="font-size:14px">Category: {{$blog->category}}  &nbsp;&nbsp;&nbsp; Created Date: {{ $blog->created_at->format('d M Y') }} </p>
        </div>
    </div>
    <div class="row mt-4" style="margin-bottom: 5rem;">
        <div class="col-12 col-md-6">
            <img src="{{url('files/blog',$blog->feature_image)}}" class="img-fluid"/>
        </div>
        <div class="col-12 col-md-6">
            <p>{!!$blog->description!!}</p>
        </div>
    </div>
</div>
@endsection
