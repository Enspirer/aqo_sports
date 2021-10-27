@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')
    <div class="loginFormmain">
        <div class="container">
            <div class="container">
                <div class="loginForm">
                    <div class="title">
                        <h3>Reset Password</h3>
                        <p>Please enter your email address</p>
                    </div>

                    @include('includes.partials.messages')

                    <div>

                        {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                        
                        <div class="form-group">
                            <input maxlength="191" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" required/>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                        </div>
                            
                        {{ html()->form()->close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



