<!DOCTYPE html>
<html lang="en">
<head>
    <title>AQOSE | AQO Sports & Entertainments</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"
    />
    <link rel="stylesheet" href="{{url('aqo_se/Styles/css/style.css')}}"/>
    <link rel="stylesheet" href="{{url('aqo_se/plugin/owl-carousel/css/owl.carousel.min.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="Styles/css/style.css" />
</head>
<body>
<div class="main">
    <header>
        @include('frontend.includes.nav')

        @yield('content')
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


<script src="{{url('/aqo_se/plugin/owl-carousel/js/owl.carousel.js')}}"></script>
<script src="{{url('/aqo_se/plugin/owl-carousel/js/jquery.mousewheel.min.js')}}"></script>


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
</body>
</html>
