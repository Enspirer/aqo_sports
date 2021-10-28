<!DOCTYPE html>
<html lang="en">
<head>
    <title>AQOSE | AQO Sports & Entertainments</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    @stack('before-styles')
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" href="{{url('aqo_se/Styles/css/style.css')}}"/>
    <link rel="stylesheet" href="{{url('aqo_se/Styles/css/styles.css')}}"/>
    <link rel="stylesheet" href="{{url('aqo_se/plugin/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="https://kit.fontawesome.com/aa4e69f91b.js" crossorigin="anonymous"></script>
    
    @stack('after-styles')
</head>
<body>
<div class="main">
    <header>
        @include('frontend.includes.nav')

        @yield('content')

        @include('frontend.includes.footer')
    </header>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!-- -------------- Date Rang Picker -------------------- -->
@stack('before-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='https://kevinchappell.github.io/formBuilder/assets/js/form-render.min.js'></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script src="{{url('/aqo_se/plugin/owl-carousel/js/owl.carousel.js')}}"></script>
<script src="{{url('/aqo_se/plugin/owl-carousel/js/jquery.mousewheel.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

@stack('after-scripts')

@stack('footer_script')

<script src="{{url('aqo_se/JS/main.js')}}"></script>
<script>
    $(document).ready(function () {
        var owl = $('.owl-carousel');
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout:1000,
            // nav: true,
            // navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        // owl.on('mousewheel', '.owl-stage', function (e) {
        //     if (e.deltaY > 0) {
        //         owl.trigger('next.owl');
        //     } else {
        //         owl.trigger('prev.owl');
        //     }
        //     e.preventDefault();
        // });
    })
</script>

<script>
    // This function will get the video ID
    function get_video_id(url){
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);
        return (match&&match[7].length==11)? match[7] : false;
    }

    // Start Appending the elements to the dom
    $(document).ready(function(){

        // Append the video thumbnail on load
        $('.video-warpper').is(function(){
            var id = get_video_id($(this).data('url')) // Video ID
            $(this).append( '<img class="video-thump" src="https://img.youtube.com/vi/'+ id +'/0.jpg" alt="" />' ); // Append the image
        });

        // Append the video iframe on user's click on the thumbnail
        $('.video-warpper').click(function(){
            var id = get_video_id($(this).data('url')) // Get the ID
            $(this).append(
                '<iframe src="https://www.youtube.com/embed/' + id + '?showinfo=0&iv_load_policy=3&modestbranding=1&autoplay=1&rel=0"></iframe>'); // Appending the iframe
            $(this).find('.dark-layer').fadeOut() // Remove the dark layer
            $(this).find('.video-thump').fadeOut() // Remove the video thumbnail
        });

    });
</script>
</body>
</html>
