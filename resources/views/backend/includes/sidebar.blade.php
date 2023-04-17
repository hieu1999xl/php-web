<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <div class="c-sidebar-brand"> <a href="{{route("backend.dashboard")}}"><img class="c-sidebar-brand-full" src="{{asset('frontend/assets/images/section_1/logo.webp')}}" height="40" alt="{{ app_name() }}"><img class="c-sidebar-brand-minimized" src="{{asset("img/backend-logo-square.jpg")}}" height="40" alt="{{ app_name() }}"></a> </div>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{ route('backend.dashboard') }}" class="c-sidebar-nav-link">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>@lang("Dashboard")
            </a>
        </li>
            <li class="nav-item">
                <a href="#" class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" id="item-article">
                    <i class="c-sidebar-nav-icon fas fa-file-alt"></i>@lang("Article")
                </a>
                <ul class="sub-item-article" id="sub-item-article">
                    @can('view_posts')
                        <li class="nav-item">
                            <a href="{{ route('backend.posts.index') }}" class="c-sidebar-nav-link c-sidebar-nav-link">
                                <i class="c-sidebar-nav-icon fas fa-file-alt"></i>@lang("Posts")
                            </a>
                        </li>
                    @endcan
                    @can('view_cvs')
                        <li class="nav-item">
                            <a href="{{ route('backend.cvs.index') }}" class="c-sidebar-nav-link">
                                <i class="c-sidebar-nav-icon fas fa-address-book"></i>CVs
                            </a>
                        </li>
                    @endcan
                        @can('view_cvs')
                            <li class="nav-item">
                                <a href="{{ route('backend.menus.index') }}" class="c-sidebar-nav-link">
                                    <i class="c-sidebar-nav-icon fas fa-address-book"></i>Menus
                                </a>
                            </li>
                        @endcan
                        @can('view_cvs')
                            <li class="nav-item">
                                <a href="{{ route('backend.jobs.index') }}" class="c-sidebar-nav-link">
                                    <i class="c-sidebar-nav-icon fas fa-address-book"></i>Jobs
                                </a>
                            </li>
                        @endcan
                        @can('view_cvs')
                            <li class="nav-item">
                                <a href="{{ route('backend.imgupload.index') }}" class="c-sidebar-nav-link">
                                    <i class="c-sidebar-nav-icon fas fa-address-book"></i>UpLoad Image
                                </a>
                            </li>
                        @endcan
                </ul>
            </li>
{{--        @can('view_tags')--}}
{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('backend.tags.index') }}" class="c-sidebar-nav-link">--}}
{{--                    <i class="fas fa-tags c-sidebar-nav-icon"></i>@lang("Tags")--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}
        @can('view_comments')
        <li class="nav-item">
            <a href="{{ route('backend.comments.index') }}" class="c-sidebar-nav-link">
                <i class="fas fa-comments c-sidebar-nav-icon"></i>@lang("Comments")
            </a>
        </li>
        @endcan
        @can('view_notifications')
            <li class="nav-item">
                <a href="{{ route('backend.notifications.index') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-bell"></i>@lang("Notifications")
                </a>
            </li>
        @endcan
        @if (Auth::user()->hasRole('super admin') || Auth::user()->hasRole('administrator'))
        <span class="c-sidebar-nav-title">@lang("MANAGEMENT")</span>
        @can('view_settings')
             <li class="nav-item">
                 <a href="{{ route('backend.settings') }}" class="c-sidebar-nav-link">
                     <i class="c-sidebar-nav-icon fas fa-cogs"></i>@lang('settings')
                 </a>
             </li>
        @endcan
        @can('view_backups')
         <li class="nav-item">
             <a href="{{ route('backend.backups.index') }}" class="c-sidebar-nav-link">
                 <i class="c-sidebar-nav-icon fas fa-archive"></i>@lang('Backup')
             </a>
         </li>
        @endcan
        <li class="nav-item">
         <a href="#" class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" id="item-access">
             <i class="c-sidebar-nav-icon cil-shield-alt"></i>@lang('Access Control')
         </a>
         <ul class="sub-item-access" id="sub-item-access">
             @can('view_users')
                  <li class="nav-item">
                      <a href="{{ route('backend.users.index') }}" class="c-sidebar-nav-link">
                          <i class="c-sidebar-nav-icon cil-people"></i>@lang('Users')
                      </a>
                  </li>
             @endcan
             @can('view_roles')
                  <li class="nav-item">
                      <a href="{{ route('backend.roles.index') }}" class="c-sidebar-nav-link">
                          <i class="c-sidebar-nav-icon cil-people"></i>@lang('Roles')
                      </a>
                  </li>
             @endcan
             @can('view_permissions')
                  <li class="nav-item">
                      <a href="{{ route('backend.permissions.index') }}" class="c-sidebar-nav-link">
                          <i class="c-sidebar-nav-icon cil-people"></i>@lang('permissions')
                      </a>
                  </li>
             @endcan
         </ul>
     </li>
        @can('view_logs')
             <li class="nav-item">
                 <a href="#" class="c-sidebar-nav-dropdown-toggle" id="item-log">
                     <i class="c-sidebar-nav-icon cil-list-rich"></i>@lang('Log Viewer')
                 </a>
                 <ul class="sub-item-log" id="sub-item-log">
                     <li class="nav-item">
                         <a href="{{ route('log-viewer::dashboard') }}" class="c-sidebar-nav-link">
                             <i class="c-sidebar-nav-icon cil-list"></i>@lang('Dashboard')
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('log-viewer::logs.list') }}" class="c-sidebar-nav-link">
                             <i class="c-sidebar-nav-icon cil-list-numbered"></i>@lang('Logs by Days')
                         </a>
                     </li>
                 </ul>
             </li>
        @endcan
        @endif

    </ul>
</div>
