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
                <h1 class="fw-bolder text-center" style="font-size: 50px;">{{ $title }}</h1>
            </div>
        </div>
    </div>
</div>


<div class="container blogs" style="margin-bottom: 5rem;">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-12 col-md-4 mb-4 position-relative">
                <a href="{{route('frontend.blog_post', $post->id)}}" style="color:black">
                    <div class="card" style="height: 29rem;">
                        <img src="{{ url('files/blog', $post->feature_image) }}" class="card-img-top" alt="..." style="height: 17rem; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="fw-bold" style="font-size: 0.9rem;">{{ $post->title }}</h6>
                            <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; font-size: 0.8rem;">
                                {!!$post->description!!}
                            </div>
                            
                            <div class="position-absolute read">
                                <p style="color: #FF0000; font-size: 0.8rem;">Read More<i class="fas fa-arrow-right ml-2"></i></p>
                            </div>

                        </div>
                    </div>
                <a>
            </div>
        @endforeach
    </div>
</div>
@endsection
