<section class="container-fluid pt-5 pb-3 text-white footer" style="background: transparent linear-gradient(180deg, #002a89 0%, #002855 100%) 0% 0% no-repeat padding-box">
    <div class="container">
        <div class="row">
            <div class="col-3 first-column">
                <a href="{{ route('frontend.index') }}"><img src="{{url('aqo_se/assets/image/logo_new.png')}}" style="height: 5rem; width: 13rem;"></a>

                <p class="text-white mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <div class="row">
                    <div class="col-2 pr-0">
                        <i class="bi bi-telephone-fill text-white"></i>
                    </div>
                    <div class="col-10 pl-0">
                        <p class="text-white mb-3">+94 777000000</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 pr-0">
                        <i class="bi bi-envelope-fill text-white"></i>
                    </div>
                    <div class="col-10 pl-0">
                        <p class="text-white mb-3">info@eshop.com</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 pr-0">
                        <i class="bi bi-geo-alt-fill text-white"></i>
                    </div>
                    <div class="col-10 pl-0">
                        <p class="text-white mb-3">587/ C NUGEGODA, COLOMBO 5</p>
                    </div>
                </div>
               
            </div>
            <div class="col-3 links" style="padding-left: 6rem;">
                <h5 class="fw-bolder mt-3 mb-4">Quick Links</h5>
                <a href="{{ route('frontend.index') }}" class="mb-3 text-decoration-none text-white">Home</a> <br>
                <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}" class="mb-3 text-decoration-none text-white">Explore</a> <br>
                <a href="#" class="mb-3 text-decoration-none text-white">Training</a> <br>
                <a href="{{ route('frontend.about_us') }}" class="mb-3 text-decoration-none text-white">About Us</a>
            </div>
            <div class="col-3 links pl-5">
                <h5 class="text-white fw-bolder mt-3 mb-4">Important</h5>
                <a href="{{ route('frontend.terms_and_conditions') }}" class="mb-3 text-decoration-none text-white">Terms & Conditions</a> <br>
                <a href="" class="mb-3 text-decoration-none text-white">Become a Partner</a> <br>
                <a href="" class="mb-3 text-decoration-none text-white">Cookie Policy</a> <br>
                <a href="" class="mb-3 text-decoration-none text-white">Privacy Policy</a> <br>
                <a href="" class="mb-3 text-decoration-none text-white">FAQ</a>
            </div>
            <div class="col-3 pl-5 social">
                <h5 class="fw-bolder mt-3 mb-4">Follow Us</h5>

                <div class="row">
                    <div class="col-12">
                        <a href="" class="mr-4"><i class="fab fa-facebook-square text-white"></i></a>

                        <a href="" class="mr-4"><i class="fab fa-instagram text-white"></i></a>

                        <br><br>
                        <a href="" class="mr-4"><i class="fab fa-linkedin text-white"></i></a>

                        <a href="" class="mr-4"><i class="fab fa-youtube-square text-white"></i></a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <hr>
        <div class="row align-items-center mb-3">
            <div class="col-6">
                <p class="text-white mb-0">COPYRIGHT &copy;2021 ALL RIGHTS RESERVED</p>
            </div>
            <div class="col-6 text-right">
                <p class="text-white mb-0">POWERED BY <a href="https://www.enspirer.com" class="text-white text-decoration-none" target="_blank">ENSPIRER</a></p>
            </div>
        </div>
    </div>
</section>