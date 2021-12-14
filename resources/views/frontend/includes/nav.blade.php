
<!-- <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div> -->

<div class="top">
    <div class="container">
        <div class="row justify-content-end">
            <div class="logo col col-md-3 col-sm-4 col-xs-3 justify-content-center align-items-center">
                <a href="{{ route('frontend.index') }}" class="text-decoration-none"><img src="{{url('aqo_se/assets/image/logo/AQOES-logo.png')}}" alt="" srcset="" class="img-fluid" style="image-rendering: -webkit-optimize-contrast; /* Webkit (non-standard naming) */"/></a>
            </div>
            <div class="name col col-md-6 justify-content-center align-items-center">
                <a href="{{ route('frontend.index') }}" class="text-decoration-none"><img src="{{url('aqo_se/assets/image/logo/aqoselightlg.png')}}" alt="" srcset=""/></a>
            </div>
            <div class="buttons col col-md-3">

                    @auth()
                    <div class="inline">
                        <div class="user-menu-wrap">
                            <a class="mini-photo-wrapper" href="#">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img class="mini-photo" src=" {{ $logged_in_user->picture }}" width="36" height="36" />
                                    </div>
                                    <div class="col-9">
                                        <h6 class="d-inline-block">{{auth()->user()->first_name}}</h6>
                                    </div>
                                </div>
                                
                                <div class="menu-container">
                                    <ul class="user-menu">
                                        <div class="profile-highlight">
                                            <img src=" {{ $logged_in_user->picture }}"
                                                 alt="profile-img" width=36 height=36>
                                            <div class="details">
                                                <a href="{{route('frontend.user.dashboard')}}">
                                                    <div id="profile-name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                                                    <div id="profile-footer">Dashboard</div>
                                                </a>

                                            </div>
                                        </div>
                                        <li class="user-menu__item">
                                            <a class="user-menu-link" href="{{route('frontend.user.my_competition')}}">
                                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/trophy.png"
                                                     alt="trophy_icon" width=20 height=20>
                                                <div>My Competitions</div>
                                            </a>
                                        </li>

                                        @if(is_judge(auth()->user()->id))
                                            <li class="user-menu__item">
                                                <a class="user-menu-link" href="{{route('frontend.user.details_judgement')}}">
                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/team.png"
                                                        alt="team_icon" width=20 height=20>
                                                    <div>My Judgments</div>
                                                </a>
                                            </li>
                                        @endif
                                        <div class="footer">
                                            <li class="user-menu__item">
                                                <a class="user-menu-link" href="{{ route('frontend.user.user_settings') }}">User Settings</a>
                                            </li>
                                            <li class="user-menu__item">
                                                <a class="user-menu-link" href="{{route('frontend.auth.logout')}}" style="color: #F44336;">Logout</a>
                                            </li>                                            
                                        </div>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <!-- <h6>{{auth()->user()->first_name}}</h6> -->
                    </div>
                    @else
                    <div class="inline">
                        <!-- <select class="selectpicker" data-width="fit">
                            <option>En</option>
                            <option>Es</option>
                        </select> -->
                        <a href="{{route('frontend.auth.login')}}" class="buttonSignIn">Sign In</a>
                        <a href="{{route('frontend.auth.register')}}" class="buttonRegister">Register</a>
                    </div>
                    @endauth

            </div>

            <!-- <div class="menu col col-sm-4 col-xs-3 text-right float-right justify-content-end">
                <a href="javascript:void(0)" onclick="openNav()"><i class="fa fa-bars"></i></a>
            </div> -->
        </div>
    </div>
</div>
<!-- <div class="bottom">
    <div class="container">
        <div class="row">
            <div class="leftLogo col-md-2">
                <div class="logoDark d-none">
                    <img src="{{url('aqo_se/assets/image/logo/aqosedarksm.png')}}" alt=""/>
                </div>
            </div>

            <div class="col-md-8">
                <nav>
                    <ul>
                        <li>
                            <a href="{{url('/')}}" class="{{ Request::segment(1) == '' ? 'active' : null }}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}" class="{{ Request::segment(1) == 'competition' ? 'active' : null }}">Events</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.training') }}" class="{{ Request::segment(1) == 'training' ? 'active' : null }}">Training</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.about_us') }}" class="{{ Request::segment(1) == 'about-us' ? 'active' : null }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.contact') }}" class="{{ Request::segment(1) == 'contact' ? 'active' : null }}">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light main-nav" style="box-shadow: 0 10px 10px -10px rgb(0 0 0 / 35%); height: 51px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
        <li>
            <a href="{{url('/')}}" class="{{ Request::segment(1) == '' ? 'active' : null }}">Home</a>
        </li>
        <li>
            <a href="{{route('frontend.explorer', ['category','keyword','desc','country','start_date','end_date'])}}" class="{{ Request::segment(1) == 'competition' ? 'active' : null }}">Events</a>
        </li>
        <li>
            <a href="{{ route('frontend.training') }}" class="{{ Request::segment(1) == 'training' ? 'active' : null }}">Training</a>
        </li>
        <li>
            <a href="{{ route('frontend.about_us') }}" class="{{ Request::segment(1) == 'about-us' ? 'active' : null }}">About Us</a>
        </li>

        <li>
            <a href="{{ route('frontend.posts', 'news') }}" class="{{ Request::segment(1) == 'posts' ? 'active' : null }}">News</a>
        </li>

        <li>
            <a href="{{ route('frontend.ranking','competition_detail') }}" class="{{ Request::segment(1) == 'ranking' ? 'active' : null }}">Rankings</a>
        </li>

        <li>
            <a href="{{ route('frontend.votes','competition_detail_two') }}" class="{{ Request::segment(1) == 'votes' ? 'active' : null }}">Votes</a>
        </li>

        <li>
            <a href="{{ route('frontend.contact') }}" class="{{ Request::segment(1) == 'contact' ? 'active' : null }}">Contact Us</a>
        </li>

        <li class="log-reg d-none">
            <a href="{{route('frontend.auth.login')}}" class="buttonSignIn {{ Request::segment(1) == 'login' ? 'active' : null }}">Sign In</a>
        </li>

        <li class="log-reg d-none">
            <a href="{{route('frontend.auth.register')}}" class="buttonRegister {{ Request::segment(1) == 'register' ? 'active' : null }}">Register</a>
        </li>
            
    </ul>
  </div>
</nav>



@push('after-scripts')
    <script>
        $(document).ready(function () {
        
            // Avatar Drop Down 
            document.querySelector('.mini-photo-wrapper').addEventListener('click', function() {
                document.querySelector('.menu-container').classList.toggle('active');
            });
            
        });
    </script>

@endpush