@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/blog.css') }}">
@endpush


@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row advert" style="margin-top: 30px;">
            <div class="col-12 col-md-6 text-center mb-3 mb-md-0">
                @if($nleft != null)
                <a href="{{$nleft->link}}" target="_blank">
                    <img src="{{ url('files/advertisement',$nleft->image) }}" alt="..." class="img-fluid w-100 left" style="height: 20rem; object-fit: cover;">
                </a>
                @else
                    <img src="{{ url('img/no-image.jpg') }}" alt="..." class="img-fluid w-100 left" style="height: 20rem; object-fit: cover;">
                @endif
            </div>
            <div class="col-12 col-md-6 pl-3 pl-md-0">
                <div class="row">
                    <div class="col-12 col-md-8 pr-3 pr-md-0 mb-3 mb-md-0">
                        <div class="row">
                            <div class="col-12">
                                @if($nmiddle_top != null)
                                    <a href="{{$nmiddle_top->link}}" target="_blank">
                                        <img src="{{ url('files/advertisement',$nmiddle_top->image) }}" alt="..." class="img-fluid w-100 middle-top" style="height: 9.7rem; margin-bottom: 0.6rem; object-fit: cover;">
                                    </a>
                                @else
                                    <img src="{{ url('img/no-image.jpg') }}" alt="..." class="img-fluid w-100 middle-top" style="height: 9.7rem; margin-bottom: 0.6rem; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-12">
                                @if($nmiddle_bottom != null)
                                    <a href="{{$nmiddle_bottom->link}}" target="_blank">
                                        <img src="{{ url('files/advertisement',$nmiddle_bottom->image) }}" alt="..." class="img-fluid w-100 middle-bottom" style="height: 9.7rem; object-fit: cover;">
                                    </a>
                                @else
                                    <img src="{{ url('img/no-image.jpg') }}" alt="..." class="img-fluid w-100 middle-bottom" style="height: 9.7rem; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 pl-3 pl-md-0">
                        <div class="col-12">
                            @if($nright != null)
                                <a href="{{$nright->link}}" target="_blank">
                                    <img src="{{ url('files/advertisement',$nright->image) }}" alt="..." class="img-fluid w-100 right" style="height: 20rem; object-fit: cover;">
                                </a>
                            @else
                                <img src="{{ url('img/no-image.jpg') }}" alt="..." class="img-fluid w-100 right" style="height: 20rem; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="padding-top: 3rem">
                <h1 class="fw-bolder text-center" style="font-size: 50px;">{{ $title }}</h1>
            </div>
        </div>
    </div>
</div>


<div class="container blogs" style="margin-bottom: 4rem;">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-12 col-md-4 mb-4 position-relative">
                <div class="card" style="height: 31rem;">
                    <img src="{{ url('files/blog', $post->feature_image) }}" class="card-img-top" alt="..." style="height: 17rem; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="fw-bold" style="font-size: 0.9rem;">{{ $post->title }}</h6>
                        <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; font-size: 0.8rem;">
                            {!!$post->description!!}
                        </div>

                        @if($post->external_link != null)
                            <div class="position-absolute article">
                                <a href="{{ $post->external_link }}" type="button" class="btn" target="_blank">View Article</a>
                            </div>
                        @endif
                        
                        <div class="position-absolute read">
                            <a href="{{route('frontend.blog_post', $post->id)}}" type="button" style="color: #FF0000; font-size: 0.8rem;">Read More<i class="fas fa-arrow-right ml-2"></i></a>
                        </div>

                        <div class="row position-absolute card-social">
                            <div class="col-12">
                                <a><i class="fab fa-facebook-square text-white"></i></a>

                                <a><i class="fab fa-instagram text-white"></i></a>

                                <a><i class="fab fa-youtube-square text-white"></i></a>

                                <a><i class="fab fa-twitter text-white"></i></a>

                                <a><i class="fab fa-tiktok text-white"></i></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
