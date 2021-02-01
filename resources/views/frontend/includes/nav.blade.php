
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<div class="top">
    <div class="container">
        <div class="row justify-content-end">
            <div class="logo col col-md-3 col-sm-4 col-xs-3">
                <img src="{{url('aqo_se/assets/image/logo/aqoselightsm.png')}}" alt="" srcset=""/>
            </div>
            <div class="name col col-md-6 ">
                <img src="{{url('aqo_se/assets/image/logo/aqoselightlg.png')}}" alt="" srcset=""/>
            </div>
            <div class="buttons col col-md-3">
                <div class="inline">
                    <select class="selectpicker" data-width="fit">
                        <option>En</option>
                        <option>Es</option>
                    </select>
                    <a href="{{route('frontend.auth.login')}}" class="buttonSignIn">Sign In</a>
                    <a href="{{route('frontend.auth.register')}}" class="buttonRegister">Register</a>
                </div>
            </div>

            <div class="menu col col-sm-4 col-xs-3 text-right float-right justify-content-end">
                <a href="javascript:void(0)" onclick="openNav()"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="bottom">
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
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.explorer',['all','all','desc','explorer','all','null','null'])}}">Explore</a>
                        </li>
                        <li>
                            <a href="#">Training</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>