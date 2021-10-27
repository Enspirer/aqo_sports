@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')


    <div class="loginFormmain">
        <div class="container">
            <div class="container">
                <div class="loginForm">
                    <div class="title">
                        <h3>Welcome to AQOSE,</h3>
                        <p>Please Sign In to continue</p>
                    </div>
                    <a href="" class="button button--facebook">Continue With Facebook</a>
                    <a href="" class="button button--google">Continue With Google</a>
                    {!! $socialiteLinks !!}
                    <div class="separator">or</div>
                    @include('includes.partials.messages')
                    <div>
                        {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}

                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}
                            <input maxlength="191" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email / Username" required/>
                        </div>
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}
                            <input  type="password"  class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required/>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Submit
                        </button>
                        <div class="row d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1"
                                >Remember Me</label>
                            </div>
                            <a href="{{ route('frontend.auth.password.reset') }}" class="text-right">Forget Password?</a>
                        </div>

                        <div class="bottumText">
                            <p>Not a member yet? <a>Register Now</a></p>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
