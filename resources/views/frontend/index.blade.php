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
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        @if(count($sliders) != 0)
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @if(count($sliders) != 0)
                                        @foreach($sliders as $key => $slider)
                                            <div class="swiper-slide">
                                                <img src="{{url('files/homepage',$slider->image)}}" class="w-100" style="height: 29rem; object-fit: cover">
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="{{url('img/no-image.jpg')}}" class="w-100" style="height: 29rem;">
                                    @endif
                                    
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        @else
                            <img src="{{url('img/no-image.jpg')}}" class="w-100" style="height: 29rem;">
                        @endif
                    </div>
                    <div class="col-12 col-md-4 side-banner">
                        @if($homepage_ad != null)
                        <a href="{{$homepage_ad->link}}" target="_blank" >
                            <img src="{{url('files/advertisement',$homepage_ad->image)}}" alt="" class="w-100" style="height: 29rem; object-fit: cover">
                        </a>
                        @else
                            <img src="{{url('img/no-image.jpg')}}" alt="" class="w-100" style="height: 29rem; object-fit: cover">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="trending-competitions">
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
                                <div class="imageCard col-12 col-md-3">
                                    <div class="imageSize">
                                        <a href="{{route('frontend.competition_page',$competition->id)}}">
                                            <img src="{{url('files/'.$competition->feature_image)}}" alt="" srcset="" />
                                        </a>
                                    </div>
                                    <div class="container">
                                        <div class="nameCard p-2">
                                            <p class="mb-1" style="color: #F29709; font-size: 0.9rem;">Worldwide</p>
                                            <h5 class="font-weight-bold mb-1">{{$competition->competition_name}}</h5>
                                            <p class="mb-1" style="color: #919191; font-size: 0.9rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$competition->description}}</p>
                                            <p class="font-weight-bold" style="color: #F29709; font-size: 0.9rem;">{{ $competition->started_date}} to {{ $competition->end_date}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div> -->

        @if(count(App\Models\Blog::where('status','Enabled')->get()) != 0)
            <div class="container news" style="margin-top: 5rem;">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center font-weight-bold mb-3">Trending News</h1>
                        <div class="swiper mySwiper3">
                            <div class="swiper-wrapper">
                                
                                    @foreach(App\Models\Blog::where('status', 'Enabled')->get() as $key => $blog_posts)  
                                        <div class="swiper-slide position-relative">
                                            <a href="{{route('frontend.blog_post',$blog_posts->id)}}" style="color:black">
                                                <div class="card" style="height: 26rem;">
                                                    <img src="{{ url('files/blog',$blog_posts->feature_image) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                                                    <div class="card-body">
                                                        <h6 class="fw-bold" style="font-size: 0.9rem;">{{ $blog_posts->title }}</h6>
                                                        <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; font-size: 0.8rem;">
                                                            {!!$blog_posts->description!!}
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
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        @endif

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
                                            <a href="{{route('frontend.explorer', [$category->id,'keyword','desc','country','start_date','end_date'])}}">
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
                <h1 class="text-center font-weight-bold">AQO Group</h1>
                <div class="row mt-5">
                    <div class="card rounded-circle mb-4 mb-md-0">
                        <img src="{{url('aqo_se/assets/image/logo1.png')}}" alt="">
                    </div>

                    <div class="card rounded-circle mb-4 mb-md-0">
                        <img src="{{url('aqo_se/assets/image/logo5.png')}}" alt="">
                    </div>

                    <div class="card rounded-circle mb-4 mb-md-0">
                        <img src="{{url('aqo_se/assets/image/logo3.png')}}" alt="">
                    </div>

                    <div class="card rounded-circle mb-4 mb-md-0">
                        <img src="{{url('aqo_se/assets/image/logo4.png')}}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <div class="container black-social" style="margin-top: 7rem; margin-bottom: 3rem;">
            <div class="row justify-content-center align-items-center mb-5">
                <div class="col col-md-1 text-center">
                    <a href="https://www.facebook.com/AQO-Sports-Entertainment-100887884844064" target="_blank"><i class="fa fa-facebook-square"></i></a>
                </div>
                <!-- <div class="col col-md-1 text-center">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div> -->
                <div class="col col-md-1 text-center">
                    <a href="https://www.youtube.com/channel/UCjfaVwdsnD9-GH0mX_XKC9g" target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
                <div class="col col-md-1 text-center">
                    <a href="https://www.instagram.com/aqosportsandentertainment/" target="_blank"><i class="fa fa-instagram"></i></a>
                </div>
                <!-- <div class="col col-md-1 text-center">
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div> -->
            </div>

            <div class="row">
                <div class="col-12 col-md-4 mb-4 mb-md-0 fb">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAQO-Sports-Entertainment-100887884844064&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=901780930716877" style="border:none;overflow:hidden; width: 100%; height: 25rem;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>

                <!-- <div class="col-12 col-md-3 mb-4 mb-md-0 twitter">
                    <a href="" style="color:black" target="_blank" class="twitter-link">
                        <div class="card" style="height: 25rem;">
                            <img src="{{ url('aqo_se/assets/image/twitter_large.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                            <div class="card-body">

                                <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; font-size: 1rem;">
                                    <p class="card-text mb-1" id="description_twitter"></p>
                                </div>
                                
                                <div class="row justify-content-between mt-3 align-items-center">
                                    <div class="col-7">
                                        
                                    </div>
                                    <div class="col-5 text-right">
                                        <img src="{{url('aqo_se/assets/image/index/twitter_color.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->

                <!-- @if(count(App\Models\Blog::where('status','Enabled')->get()) != 0)
                    @foreach(App\Models\Blog::latest()->take(2)->get() as $key => $blog_posts)  
                        <div class="col-12 col-md-4 mb-4 mb-md-0">
                            <a href="{{route('frontend.blog_post',$blog_posts->id)}}" style="color:black">
                                <div class="card" style="height: 25rem;">
                                    <img src="{{ url('files/blog',$blog_posts->feature_image) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                                    <div class="card-body p-2">
                                        <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical; font-size: 0.8rem;">
                                            <p class="card-text mb-1">{!!$blog_posts->description!!}</p>
                                        </div>
                                        
                                        <div class="row justify-content-between mt-3 align-items-center">
                                            <div class="col-7">
                                                
                                            </div>
                                            <div class="col-5 text-right">
                                                @if($blog_posts->category == 'Blog')
                                                    <a style="color: #0F9D58; font-size: 1.1rem;">{{$blog_posts->category}}</a>
                                                @else
                                                    <a style="color: #FF0000; font-size: 1.1rem;">{{$blog_posts->category}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <a>
                        </div>
                    @endforeach
                @endif -->

                <!-- <div class="col-3 fb">
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
                </div> -->

                <!-- <div class="col-3">
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
                </div> -->
            </div>
        </div>
    </div>
@endsection


@push('after-scripts')

<script>
    $.get("{{route('twitter_news')}}", function(data, status){
        var data = JSON.parse(data);
        $(".twitter-link").attr("href", data.link);
        $("#description_twitter").text(data.title);
    }).
    fail(function(jqXHR, textStatus, errorThrown) {
        $('.twitter').addClass('d-none');
    });

</script>

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
            breakpoints: {

                0: {
                    slidesPerView: 1,
                },

                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 4,
                }
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiper3", {
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            slidesPerView: 3,
            spaceBetween: 30,
            breakpoints: {

                0: {
                    slidesPerView: 1,
                },

                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 3,
                }
            },
            loop: true,
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