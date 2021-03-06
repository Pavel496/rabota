@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('permission_access')
                <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('vacancy_access')
            <li class="{{ $request->segment(2) == 'vacancies' ? 'active' : '' }}">
                <a href="{{ route('admin.vacancies.index') }}">
                    <i class="fa fa-list-ol"></i>
                    <span class="title">@lang('global.vacancies.title')</span>
                </a>
            </li>
            @endcan
            
            @can('resume_access')
            <li class="{{ $request->segment(2) == 'resumes' ? 'active' : '' }}">
                <a href="{{ route('admin.resumes.index') }}">
                    <i class="fa fa-list-ol"></i>
                    <span class="title">@lang('global.resume.title')</span>
                </a>
            </li>
            @endcan
            
            @can('sphere_access')
            <li class="{{ $request->segment(2) == 'spheres' ? 'active' : '' }}">
                <a href="{{ route('admin.spheres.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('global.spheres.title')</span>
                </a>
            </li>
            @endcan
            
            @can('schedule_access')
            <li class="{{ $request->segment(2) == 'schedules' ? 'active' : '' }}">
                <a href="{{ route('admin.schedules.index') }}">
                    <i class="fa fa-calendar-times-o"></i>
                    <span class="title">@lang('global.schedule.title')</span>
                </a>
            </li>
            @endcan
            
            @can('experience_access')
            <li class="{{ $request->segment(2) == 'experiences' ? 'active' : '' }}">
                <a href="{{ route('admin.experiences.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('global.experience.title')</span>
                </a>
            </li>
            @endcan
            
            @can('lasting_access')
            <li class="{{ $request->segment(2) == 'lastings' ? 'active' : '' }}">
                <a href="{{ route('admin.lastings.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('global.lasting.title')</span>
                </a>
            </li>
            @endcan
            
            @can('phone_access')
            <li class="{{ $request->segment(2) == 'phones' ? 'active' : '' }}">
                <a href="{{ route('admin.phones.index') }}">
                    <i class="fa fa-phone"></i>
                    <span class="title">@lang('global.phones.title')</span>
                </a>
            </li>
            @endcan
            
            @can('company_access')
            <li class="{{ $request->segment(2) == 'companies' ? 'active' : '' }}">
                <a href="{{ route('admin.companies.index') }}">
                    <i class="fa fa-building"></i>
                    <span class="title">@lang('global.companies.title')</span>
                </a>
            </li>
            @endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

