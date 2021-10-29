@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')

    <div class="registerForm">
        <div class="container">
            <div class="leftSide">
                <div class="layer">
                    <h4>Compete Smarter,</h4>
                    <p>AQOSE is much better when you have an Account</p>
                    <p>Get yourself an account now</p>
                </div>
            </div>
            <div class="rightSide">
                @include('includes.partials.messages')
                {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control form-inline" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" data-toggle="password" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Confirmation</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Password" data-toggle="password" required>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="">
                        <label class="form-check-label" for="exampleCheck1">By signing up agree with <a>Terms and conditions.</a> </label>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-10 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" style="display: inline-block;"></div>
                        </div>
                    </div>

                    <!-- @if(config('access.captcha.registration'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                {{ html()->hidden('captcha_status', 'true') }}
                            </div>
                        </div>
                    @endif -->
                    <div class="theameRow">
                        <button type="submit" class="btn btn-primary submit-btn" disabled>Register</button>
                        <h6>or <a href="{{route('frontend.auth.login')}}">Sign In</a></h6>
                    </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
        $('.submit-btn').removeAttr('disabled');
    };
    </script>
@endpush
