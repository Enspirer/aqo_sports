<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    .notification {
    background-color: grey;
    color: white;
    text-decoration: none;
    position: relative;
    display: inline-block;
    border-radius: 2px;
    }

    .notification:hover {
    background: red;
    }

    .notification .badge {
    position: absolute;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
    }
</style>


<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{active_class(Active::checkUriPattern('admin/dashboard'))}}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Active::checkUriPattern('admin/competition'))}}" href="{{ route('admin.competition.organizer_request.index') }}">
                    <i class="nav-icon fas fa-file"></i>
                    Organizer Request <span class="notification badge">{{Modules\Competition\Entities\Organizer::where('status',0)->get()->count()}}</span>                    
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{active_class(Active::checkUriPattern('admin/become_judge'))}}" href="{{ route('admin.become_judge.index') }}">
                    <i class="nav-icon fas fa-user"></i>
                    Become a Judge <span class="notification badge">{{App\Models\JudgeRequest::where('status','Pending')->get()->count()}}</span>
                </a>
            </li>


            @if(get_module('Competition'))

                <li class="nav-item nav-dropdown ">
                    <a class="nav-link nav-dropdown-toggle " href="#">
                        <i class="nav-icon fas fa-trophy"></i>
                            Competitions
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Active::checkUriPattern('admin/create'))}}" href="{{ route('admin.category.index') }}">
                                <!-- <i class="nav-icon fa fa-list"></i> -->
                                Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Active::checkUriPattern('admin/competition'))}}" href="{{ route('admin.competition') }}">
                                <!-- <i class="nav-icon fas fa-trophy"></i> -->
                                Competitions
                            </a>
                        </li>
                    </ul>
                </li>               
                
            @endif
            
            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/blog'))}}" href="{{ route('admin.blog.index') }}">
                <i class="nav-icon fas fa-newspaper"></i>
                    Blog & Posts
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-running"></i>
                    Training Page
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/training_settings'))}}" href="{{ route('admin.training_settings') }}">
                            Training Page Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/training'))}}" href="{{ route('admin.training.index') }}">
                           Training Request
                        </a>
                    </li>
                 </ul>
            </li> 
            
                       
            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/advertisement'))}}" href="{{ route('admin.advertisement.index') }}">
                    <i class="nav-icon fab fa-adversal"></i>
                        Advertisements
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon far fa-images"></i>
                        Home Page
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/homepage'))}}" href="{{ route('admin.homepage.index') }}">
                            Slider
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/aqo_group'))}}" href="{{ route('admin.aqo_group.index') }}">
                           Aqo Group
                        </a>
                    </li>
                 </ul>
            </li> 
            

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_us'))}}" href="{{ route('admin.contact_us.index') }}">
                    <i class="nav-icon fas fa-comments"></i>
                    Contact Us <span class="notification badge">{{App\Models\ContactUs::where('status','Pending')->get()->count()}}</span>
                </a>
            </li>


            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{active_class(Active::checkUriPattern('admin/auth*'), 'open')}}">
                    <a class="nav-link nav-dropdown-toggle {{active_class(Active::checkUriPattern('admin/auth*'))}}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Active::checkUriPattern('admin/auth/user*'))}}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Active::checkUriPattern('admin/auth/role*'))}}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')}}">
                        <a class="nav-link nav-dropdown-toggle {{active_class(Active::checkUriPattern('admin/log-viewer*'))}}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Active::checkUriPattern('admin/log-viewer'))}}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Active::checkUriPattern('admin/log-viewer/logs*'))}}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
