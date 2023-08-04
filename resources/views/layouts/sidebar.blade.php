{{--Left sidebar--}}
<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        @canany([
          'permission.show',
          'roles.show',
          'user.show'
       ])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{ (Request::is('agent*') || Request::is('category*') || Request::is('client*')|| Request::is('transaction*')) ? 'active':''}}">
                    <i class="fas fa-list"></i>
                    <p>
                       Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: {{ (Request::is('agent*') || Request::is('category*') || Request::is('client*') ||Request::is('transaction*') ) ? 'block':'none'}};">
                    @can('agent.show')
                        <li class="nav-item">
                            <a href="{{ route('agentIndex') }}" class="nav-link {{ Request::is('agent*')||Request::is('transaction*') ? "active":'' }}">
                                <i class="fas fa-users"></i>
                                <p>@lang('cruds.agent.title')</p>
                            </a>
                        </li>
                    @endcan

                    @can('category.show')
                        <li class="nav-item">
                            <a href="{{ route('categoryIndex') }}" class="nav-link {{ Request::is('category*') ? "active":'' }}">
                                <i class="fas fa-list-alt"></i>
                                <p>Kategorya</p>
                            </a>
                        </li>
                    @endcan

                    @can('client.show')
                        <li class="nav-item">
                            <a href="{{ route('clientIndex') }}" class="nav-link {{ Request::is('client*') ? "active":'' }}">
                                <i class="fas fa-user-friends"></i>
                                <p> Klentlar</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        @canany([
          'permission.show',
          'roles.show',
          'user.show'
       ])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{ (Request::is('permission*') || Request::is('role*') || Request::is('user*')) ? 'active':''}}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        @lang('cruds.userManagement.title')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: {{ (Request::is('permission*') || Request::is('role*') || Request::is('user*')) ? 'block':'none'}};">
                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('permissionIndex') }}" class="nav-link {{ Request::is('permission*') ? "active":'' }}">
                                <i class="fas fa-key"></i>
                                <p> @lang('cruds.permission.title_singular')</p>
                            </a>
                        </li>
                    @endcan

                    @can('roles.show')
                        <li class="nav-item">
                            <a href="{{ route('roleIndex') }}" class="nav-link {{ Request::is('role*') ? "active":'' }}">
                                <i class="fas fa-user-lock"></i>
                                <p> @lang('cruds.role.fields.roles')</p>
                            </a>
                        </li>
                    @endcan

                    @can('user.show')
                        <li class="nav-item">
                            <a href="{{ route('userIndex') }}" class="nav-link {{ Request::is('user*') ? "active":'' }}">
                                <i class="fas fa-user-friends"></i>
                                <p> @lang('cruds.user.title')</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @can('api-user.view')
            <li class="nav-item">
                <a href="{{ route('api-userIndex') }}" class="nav-link {{ Request::is('api-users*') ? "active":'' }}">
                    <i class="fas fa-cog"></i>
                    <sub><i class="fas fa-child"></i></sub>
                    <p> API Users</p>
                </a>
            </li>
        @endcan
    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
            <a href="" class="nav-link">
            <i class="fas fa-palette"></i>
            <p>
                @lang('global.theme')
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
            <ul class="nav nav-treeview" style="display: none">
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'default']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-info"></i>
                        <p class="text">Default {{ auth()->user()->theme == 'default' ? '✅':'' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'light']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-white"></i>
                        <p>Light {{ auth()->user()->theme == 'light' ? '✅':'' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'dark']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-gray"></i>
                        <p>Dark {{ auth()->user()->theme == 'dark' ? '✅':'' }}</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
{{--    @can('card.main')--}}

{{--    @endcan--}}
</nav>
