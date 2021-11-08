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
                    Organizer Request
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{active_class(Active::checkUriPattern('admin/become_judge'))}}" href="{{ route('admin.become_judge.index') }}">
                    <i class="nav-icon fas fa-user"></i>
                    Become a Judge
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
                    Blogs
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/training'))}}" href="{{ route('admin.training.index') }}">
                    <i class="nav-icon fas fa-running"></i>
                    Training
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/homepage_ad'))}}" href="{{ route('admin.homepage_ad.index') }}">
                    <i class="nav-icon fas fa-running"></i>
                    Home Page Advertisement
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_us'))}}" href="{{ route('admin.contact_us.index') }}">
                    <i class="nav-icon fas fa-comments"></i>
                    Contact Us
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
