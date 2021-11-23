@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/contact_us.css') }}">
@endpush

@section('content')

@if ( session()->has('message') )
   
    <body style="text-align:center; background-color: #E8E8E8">

        <h1 style="margin-top:70px;" class="display-3">Thank You!</h1><br>
        <p class="lead"><h3>We appreciate you contacting us. One of our member will get back in touch with you soon!<br><br> Have a great day!</h3></p>
        <hr><br>    
        <p class="lead" style="margin-bottom:80px;">
            <a class="btn btn-success btn-md" href="{{url('contact')}}" role="button">Go Back to Contact Us Page</a>
        </p>
    </body>

@else 
    <div class="container-fluid py-4" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 mb-5 mb-md-0">
                    <form action="{{route('frontend.contact.store')}}" method="post" enctype="multipart/form-data" class="pt-md-4 px-md-4 pb-md-3" style="background-color: white">
                        {{csrf_field()}}
                        
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <label for="first_name" class="form-label font-weight-bold">FIRST NAME</label>
                                    <input type="text" class="form-control rounded-0" name="first_name" id="first_name" required>
                                </div>

                                <div class="col-6">
                                    <label for="last_name" class="form-label font-weight-bold">LAST NAME</label>
                                    <input type="text" class="form-control rounded-0" name="last_name" id="last_name" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label font-weight-bold">EMAIL</label>
                            <input type="email" class="form-control rounded-0" name="email" id="email" required>
                        </div>

                        <div class="mb-2">
                            <label for="phone" class="form-label font-weight-bold">PHONE NUMBER</label>
                            <input type="text" class="form-control rounded-0" name="phone" id="phone" required>
                        </div>

                        <div class="mb-2">
                            <label for="message" class="form-label font-weight-bold">LEAVE US A MESSAGE...</label>
                            <textarea class="form-control rounded-0" name="message" rows="4" required></textarea>
                        </div>

                        
                        <div class="row justify-content-center mt-3">
                            <div class="col-12 col-md-10 text-center">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" style="display: inline-block;"></div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn submit-btn w-100 font-weight-bold" disabled>Submit</button>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-md-7 pt-md-4 pl-3 pl-md-5">
                    <h4 class="mb-2 mb-md-4" style="color: #0090FF">Contact Information</h4>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bolder">AQO Sports & Entertainment</h6>
                            <p style="font-weight: 500; line-height: 1.4rem;">55 Harbour Square, <br>Downtown Toronto, Ontario, <br>M5J 2L1,<br> Canada</p>
                        </div>
                    
                        <div class="col-12 col-md-6 main-office mb-3 mb-md-0">
                            <div class="row">
                                <div class="col-1 pr-0">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="col-11">
                                    <p class="mb-3">+1 647-773-4909</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-1 pr-0">
                                    <img src="{{url('aqo_se/assets/image/contact_us/fax.png')}}" alt="" style="height: 1rem; width: 1rem;">
                                </div>
                                <div class="col-11">
                                    <p class="mb-3">0094 11 5526575</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-1 pr-0">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="col-11">
                                    <p class="mb-3">aondaatje@yahoo.ca</p>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- <div class="row mt-5">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bold">Regional Office </h6>
                        </div>
                    
                        <div class="col-12 col-md-6 main-office mb-3 mb-md-0">
                            <div class="row">
                                <div class="col-1 pr-0">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="col-11">
                                    <p class="mb-3">0094 11 2942952 / 11 5022832</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-1 pr-0">
                                    <img src="{{url('aqo_se/assets/image/contact_us/fax.png')}}" alt="" style="height: 1rem; width: 1rem;">
                                </div>
                                <div class="col-11">
                                    <p class="mb-3">0094 11 5526575</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-1 pr-0">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="col-11">
                                    <p class="mb-3">info@sport.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <h6 class="font-weight-bolder">AQO Sports & Entertainment</h6>
                            <p style="font-weight: 500; line-height: 1.4rem;">490/1B, Lionel Michel Mawatha,, <br> Eriyawetiya, Kiribathgoda, Kelaniya, <br> Sri Lanka.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
    </div>
@endif

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
        $('.submit-btn').removeAttr('disabled');
    };
    </script>

@endpush
