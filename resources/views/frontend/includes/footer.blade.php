<section class="container-fluid pt-4 pt-md-5 pb-3 text-white footer" style="background: transparent linear-gradient(180deg, #002a89 0%, #002855 100%) 0% 0% no-repeat padding-box">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 first-column">
                <a href="{{ route('frontend.index') }}"><img src="{{url('aqo_se/assets/image/logo/logo_new.png')}}" class="img-fluid" style="image-rendering: -webkit-optimize-contrast; /* Webkit (non-standard naming) */"></a>

                <!-- <p class="text-white mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->

                <div class="row mt-4">
                    <div class="col-2 pr-0">
                        <i class="bi bi-telephone-fill" style="color: #8a6e4b;"></i>
                    </div>
                    <div class="col-10 pl-0">
                        <p class="text-white mb-3">+1 647-773-4909</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 pr-0">
                        <i class="bi bi-envelope-fill" style="color: #8a6e4b;"></i>
                    </div>
                    <div class="col-10 pl-0">
                        <p class="text-white mb-3">aondaatje@yahoo.ca</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 pr-0">
                        <i class="bi bi-geo-alt-fill" style="color: #8a6e4b;"></i>
                    </div>
                    <div class="col-10 pl-0">
                        <p class="text-white mb-3">55 Harbour Square, Downtown Toronto, Ontario, M5J 2L1, Canada</p>
                    </div>
                </div>
               
            </div>
            <div class="col-12 col-md-3 links" style="padding-left: 6rem;">
                <h5 class="fw-bolder mt-3 mb-4">Quick Links</h5>
                <a href="{{ route('frontend.index') }}" class="mb-3 text-decoration-none text-white">Home</a> <br>
                <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}" class="mb-3 text-decoration-none text-white">Explore</a> <br>
                <a href="{{ route('frontend.training') }}" class="mb-3 text-decoration-none text-white">Training</a> <br>
                <a href="{{ route('frontend.about_us') }}" class="mb-3 text-decoration-none text-white">About Us</a>
            </div>
            <div class="col-12 col-md-3 links pl-3 pl-md-5">
                <h5 class="text-white fw-bolder mt-3 mb-4">Important</h5>
                <!-- <a href="{{ route('frontend.terms_and_conditions') }}" class="mb-3 text-decoration-none text-white">Terms & Conditions</a> <br> -->
                <a href="{{ route('frontend.become_a_partner') }}" class="mb-3 text-decoration-none text-white">Become a Partner</a> <br>
                <a href="{{ route('frontend.cookie_policy') }}" class="mb-3 text-decoration-none text-white">Cookie Policy</a> <br>
                <a href="{{ route('frontend.privacy_policy') }}" class="mb-3 text-decoration-none text-white">Privacy Policy</a> <br>
                <!-- <a href="{{ route('frontend.faq') }}" class="mb-3 text-decoration-none text-white">FAQ</a> -->
            </div>
            <div class="col-12 col-md-3 pl-3 pl-md-5 social">
                <h5 class="fw-bolder mt-3 mb-4">Follow Us</h5>

                <div class="row">
                    <div class="col-12">
                        <a href="https://www.facebook.com/AQO-Sports-Entertainment-100887884844064" class="" target="_blank"><i class="fab fa-facebook-square text-white"></i></a>

                        <a href="https://www.instagram.com/aqosportsandentertainment/" target="_blank" class=""><i class="fab fa-instagram text-white"></i></a>

                        <a href="https://www.youtube.com/channel/UCjfaVwdsnD9-GH0mX_XKC9g" target="_blank" class=""><i class="fab fa-youtube-square text-white"></i></a>

                        <a href="#" target="_blank" class=""><i class="fab fa-twitter text-white"></i></a>

                        <a href="#" target="_blank" class=""><i class="fab fa-tiktok text-white"></i></a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container copyright-footer">
        <hr>
        <div class="row align-items-center">
            <div class="col-12 text-center col-md-6 text-md-left">
                <p class="text-white mb-0">COPYRIGHT &copy;2021 ALL RIGHTS RESERVED</p>
            </div>
            <div class="col-12 text-center col-md-6 text-md-right">
                <p class="text-white mb-0">POWERED BY <a href="https://www.enspirer.com" class="text-white text-decoration-none" target="_blank">ENSPIRER</a></p>
            </div>
        </div>
    </div>
</section>
