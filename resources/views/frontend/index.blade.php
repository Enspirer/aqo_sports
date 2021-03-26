@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    <div class="main">
        <div class="hero-image">
            <div class="container">
                <!-- <div class="yellow-background"></div> -->
                <div class="row">
                    <div class="col-md-8">

                        <!-- <div class="slider">

                            <ul class="js__slider__images slider__images">
                              <li class="slider__images-item"><img class="slider__images-image" src="assets/image/gettyimages-592331286.jpg" /></li>
                              <li class="slider__images-item"><img class="slider__images-image" src="assets/image/slider1.jpg" /></li>
                              <li class="slider__images-item"><img class="slider__images-image" src="assets/image/slider2.jpg" /></li>
                              <li class="slider__images-item"><img class="slider__images-image" src="assets/image/sllider3.jpg" /></li>
                              <li class="slider__images-item"><img class="slider__images-image" src="assets/image/slider4.webp" /></li>
                            </ul>

                            <div class="slider__controls">
                                <span class="slider__control js__slider__control--prev slider__control--prev">Prev</span>

                                <ol class="js__slider__pagers slider__pagers"></ol>

                                <span class="slider__control js__slider__control--next slider__control--next">Next</span>
                              </div>
                          </div> -->

                        <!-- <div id="slideshow">
                            <div><img src="assets/image/gettyimages-592331286.jpg"></div>
                            <div><img src="assets/image/slider1.jpg" alt=""></div>
                            <div><img src="assets/image/slider2.jpg" alt=""></div>
                            <div><img src="assets/image/sllider3.jpg" alt=""></div>
                            <div><img src="assets/image/slider4.webp" alt=""></div>
                        </div> -->

                        <div id="slideshow">
                            <div>
                                <img src="{{url('aqo_se/assets/image/gettyimages-592331286.jpg')}}">
                            </div>
                            <div>
                                <img src="{{url('aqo_se/assets/image/slider1.jpg')}}">
                            </div>
                            <div>
                                <img src="{{url('aqo_se/assets/image/slider2.jpg')}}">
                            </div>
                            <div>
                                <img src="{{url('aqo_se/assets/image/slider3.jpg')}}">
                            </div>
                            <div>
                                <img src="{{url('aqo_se/assets/image/slider4.webp')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{url('aqo_se/assets/image/531027_16155704_2924445_facad91f_image.jpg')}}" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
        <div class="trending-competitions">
            <div class="container">
                <h1>Trending Competitions</h1>
                <div class="exploreBody">
                    <div class="row">

                        @if(count($trendingCompetition) == 0)
                            <div class="col-md-12">
                                <div style="border-style: dashed;border-width: 2px;padding: 90px;color: grey;">
                                    <h2 style="text-align: center;color: grey;"> Competition Not Found</h2>
                                </div>
                            </div>
                        @else
                            @foreach($trendingCompetition as $competition)
                                <div class="imageCard col-md-3 col-sm-6 col-xs-12">
                                    <div class="imageSize">
                                        <a href="{{route('frontend.competition_page',$competition->id)}}">
                                            <img src="{{url('files/'.$competition->feature_image)}}" alt="" srcset="" />
                                        </a>
                                    </div>
                                    <div class="container">
                                        <div class="nameCard">
                                            <h4>{{$competition->competition_name}}</h4>
                                            <p>Virtual Tournament</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif



                    </div>

                    <div class="discover-more">
                        <button>DISCOVER MORE</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="popular-categories">
            <div class="container">
                <div class="gray-background"></div>
                <h1>Popular Categories</h1>

                @if(count($competitionCategory) == 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div style="border-style: dashed;border-width: 2px;padding: 90px;color: grey;">
                                <h2 style="text-align: center;color: grey;"> Competition Not Found</h2>
                            </div>
                        </div>
                    </div>

                @else
                    <section id="categories-slider">
                        <div id="owl-example" class="owl-carousel">
                            @foreach($competitionCategory as $competitionCat)
                                <div>
                                    <a href="{{route('frontend.explorer',[$competitionCat->id,'all','desc','explorer','all','null','null'])}}">
                                        <div style="background-image: url('{{url('files/'.$competitionCat->feature_image)}}');height: 200px;background-size: cover;background-repeat: no-repeat;background-position: center;" alt="">

                                        </div>
                                    </a>

                                    <h3>{{$competitionCat->category_name}}</h3>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif


            </div>
        </div>


        <div class="entertaintment">
            <div class="container">
                <div class="yellow-background"></div>
                <h1>Entertainment</h1>
                <div class="row">
                    <div class="top-section col-md-4">
                        <div class="card-white-blur">
                            <div class="card-white">
                                <div class="left-silver">
                                    <div class="white-opacity">

                                    </div>
                                </div>
                                <h3>Top Story</h3>
                                <div class="content">
                                    <h4>Billie Eilish tenues mode</h4>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat</p>
                                </div>
                            </div>
                        </div>
                        <div class="top-image">
                            <div class="imageSize">
                                <img src="{{url('aqo_se/assets/image/MaskGroup66.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="normal-section col-md-6">
                        <div class="row">
                            <div class="imageCard col-md-6">
                                <div class="imageSize">
                                    <img src="{{url('aqo_se/assets/image/MaskGroup65.png')}}" alt="" srcset="" />
                                </div>
                                <div class="container">
                                    <div class="nameCard">
                                        <h4>Latest album</h4>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed eirmod...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="imageCard col-md-6">
                                <div class="imageSize">
                                    <img src="{{url('aqo_se/assets/image/MaskGroup64.png')}}" alt="" srcset="" />
                                </div>
                                <div class="container">
                                    <div class="nameCard">
                                        <h4>Latest album</h4>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed eirmod...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="imageCard col-md-6">
                                <div class="imageSize">
                                    <img src="{{url('aqo_se/assets/image/MaskGroup64.png')}}" alt="" srcset="" />
                                </div>
                                <div class="container">
                                    <div class="nameCard">
                                        <h4>Latest album</h4>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed eirmod...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="imageCard col-md-6">
                                <div class="imageSize">
                                    <img src="{{url('aqo_se/assets/image/MaskGroup65.png')}}" alt="" srcset="" />
                                </div>
                                <div class="container">
                                    <div class="nameCard">
                                        <h4>Latest album</h4>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed eirmod...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-section col-md-2" style="margin-top: inherit;">
                        <img src="{{url('aqo_se/assets/image/MaskGroup68.png')}}" alt="" srcset="">
                    </div>
                    <div class="discover-more">
                        <button>DISCOVER MORE</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="whats-new">
            <div class="container">
                <div class="gray-background"></div>
                <h1>What's New</h1>
                <div class="row">
                    <div class="col-md-3">
                        <div class="imageCard">
                            <div class="imageSize">
                                <img src="{{url('aqo_se/assets/image/MaskGroup33.png')}}" alt="" srcset="" />
                            </div>
                            <div class="container-image">
                                <div class="nameCard">
                                    <h4>Latest album</h4>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed eirmod...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="imageCard">
                            <div class="imageSize">
                                <img src="{{url('aqo_se/assets/image/MaskGroup34.png')}}" alt="" srcset="" />
                            </div>
                            <div class="container-image">
                                <div class="nameCard">
                                    <h4>Latest album</h4>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed eirmod...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="video-player col-md-6">
                        <div class="overlay"></div>
                        <img src="{{url('aqo_se/assets/image/MaskGroup32.png')}}" alt="">
                        <!-- <button><i class="fa fa-play-circle-o" aria-hidden="true"></i></button> -->
                        <h6>Week 12 match highlights</h6>
                        <div class="video-play-button"></div>
                    </div>

                    <div class="discover-more">
                        <button>DISCOVER MORE</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-section">
            <div class="container">
                <img src="{{url('aqo_se/assets/image/logo1.png')}}" alt="">
            </div>
        </div>

        <div class="our-group">
            <div class="container">
                <h1>Our Groups</h1>
                <div class="row">
                    <div class="card rounded-circle">
                        <img src="{{url('aqo_se/assets/image/logo1.png')}}" alt="">
                    </div>

                    <div class="card rounded-circle">
                        <img src="{{url('aqo_se/assets/image/logo5.png')}}" alt="">
                    </div>

                    <div class="card rounded-circle">
                        <img src="{{url('aqo_se/assets/image/logo3.png')}}" alt="">
                    </div>

                    <div class="card rounded-circle">
                        <img src="{{url('aqo_se/assets/image/logo4.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
