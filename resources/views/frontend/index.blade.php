@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/index.css') }}">
@endpush


@section('content')

    <div class="main">
        <div class="hero-image">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{url('aqo_se/assets/image/slider1.png')}}" class="w-100" style="height: 29rem;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{url('aqo_se/assets/image/slider2.png')}}" class="w-100" style="height: 29rem;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{url('aqo_se/assets/image/slider3.png')}}" class="w-100" style="height: 29rem;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{url('aqo_se/assets/image/slider4.png')}}" class="w-100" style="height: 29rem;">
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{url('aqo_se/assets/image/dialog.png')}}" alt="" class="w-100" style="height: 29rem;">
                    </div>
                </div>
            </div>
        </div>

        <div class="trending-competitions">
            <div class="container">
                <h1 class="text-center font-weight-bold">Trending Competitions</h1>
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
                                <div class="imageCard col-3">
                                    <div class="imageSize">
                                        <a href="{{route('frontend.competition_page',$competition->id)}}">
                                            <img src="{{url('files/'.$competition->feature_image)}}" alt="" srcset="" />
                                        </a>
                                    </div>
                                    <div class="container">
                                        <div class="nameCard p-2">
                                            <p class="mb-1" style="color: #F29709; font-size: 0.9rem;">Worldwide</p>
                                            <h5 class="font-weight-bold mb-1">{{$competition->competition_name}}</h5>
                                            <p class="mb-1" style="color: #919191; font-size: 0.9rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure eligendi, ipsa pariatur iusto voluptatum vero ad sunt in provident.</p>
                                            <p class="font-weight-bold" style="color: #F29709; font-size: 0.9rem;">Oct 9 2021 - Oct 30 2021</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <section class="trending" style="margin-top: 5rem;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center font-weight-bold">Popular Categories</h1>

                        @if(count($competitionCategory) == 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border-style: dashed;border-width: 2px;padding: 90px;color: grey;">
                                        <h2 style="text-align: center;color: grey;">Popular Categories Not Found</h2>
                                    </div>
                                </div>
                            </div>
                        @else

                            <div class="swiper mySwiper2 mt-5">
                                <div class="swiper-wrapper">
                                    @foreach($competitionCategory as $category)
                                        <div class="swiper-slide position-relative">
                                            <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}">
                                                <img src="{{url('files/'.$category->feature_image)}}" alt="" srcset="" class="w-100" style="height: 18rem; object-fit:cover;"/>
                                            </a>

                                            <i class="fas fa-chevron-up arrow"></i>

                                            <div class="carousel-caption">
                                                <h5 class="mb-2">{{$category->category_name}}</h5>
                                                <p style="font-size: 0.9rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$category->description}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="our-group" style="margin-top: 5rem;">
            <div class="container">
                <h1 class="text-center font-weight-bold">Our Groups</h1>
                <div class="row mt-5">
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
        </section>


        <div class="container social" style="margin-top: 7rem; margin-bottom: 3rem;">
            <div class="row justify-content-center align-items-center mb-5">
                <div class="col-1 text-center">
                    <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                </div>
                <div class="col-1 text-center">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
                <div class="col-1 text-center">
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
                <div class="col-1 text-center">
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="col-1 text-center">
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="col-3 fb">
                    <div class="card" style="height: 25rem;">
                        <img src="{{url('aqo_se/assets/image/index/social_1.png')}}" class="img-fluid w-100" alt="..." style="object-fit: cover; height: 13rem;">
                        <div class="card-body p-2">
                            <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 115px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                            
                            <div class="row justify-content-between mt-3 align-items-center">
                                <div class="col-7">
                                    <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                                </div>
                                <div class="col-5 text-right">
                                    <img src="{{url('aqo_se/assets/image/index/fb_color.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="col-3 twitter">
                    <div class="card" style="height: 25rem;">
                        <img src="{{url('aqo_se/assets/image/index/social_2.png')}}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                        <div class="card-body p-2">
                            <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 115px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                            
                            <div class="row justify-content-between mt-3 align-items-center">
                                <div class="col-7">
                                    <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                                </div>
                                <div class="col-5 text-right">
                                    <img src="{{url('aqo_se/assets/image/index/twitter_color.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="col-3">
                    <div class="card" style="height: 25rem;">
                        <img src="{{url('aqo_se/assets/image/index/social_3.png')}}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                        <div class="card-body p-2">
                            <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 115px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                            
                            <div class="row justify-content-between mt-3 align-items-center">
                                <div class="col-7">
                                    <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                                </div>
                                <div class="col-5 text-right">
                                    <a href="#" style="color: #0F9D58; font-size: 1.1rem;">Blogs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card" style="height: 25rem;">
                        <img src="{{url('aqo_se/assets/image/index/social_4.png')}}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                        <div class="card-body p-2">
                            <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 115px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>

                            <div class="row justify-content-between mt-3 align-items-center">
                                <div class="col-7">
                                    <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                                </div>
                                <div class="col-5 text-right">
                                    <a href="#" style="color: #FF0000; font-size: 1.1rem;">News</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('after-scripts')

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });
    </script>


    <script>
      var swiper = new Swiper(".mySwiper2", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        slidesPerView: 4,
        spaceBetween: 30,
      });
    </script>


      <script>
          $('.trending .swiper .swiper-slide').hover(function() {
              $(this).find('.carousel-caption').addClass('trans-caption');
              $(this).find('i').addClass('trans-arrow');
          }, function() {
            $(this).find('.carousel-caption').removeClass('trans-caption');
            $(this).find('i').removeClass('trans-arrow');
          });
      </script>
@endpush