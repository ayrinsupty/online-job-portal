@php
    $userGuard = Auth::guard('admin')->user();
@endphp
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.home') }}"><img src="{{ asset('backend/assets/images/logo/logo.png') }}"
                            alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="{{ route('admin.home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Admin --}}
                @if (
                    $userGuard->can('admin.view') ||
                        $userGuard->can('admin.create') ||
                        $userGuard->can('admin.edit') ||
                        $userGuard->can('admin.delete'))
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Admin's</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.admins.create') || Route::is('admin.admins.edit') || Route::is('admin.admins.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('admin.view'))
                                    <a {{ Route::is('admin.admins.edit') || Route::is('admin.admins.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.admins.index') }}">Admin's</a>
                                @endif
                                @if ($userGuard->can('admin.create'))
                                    <a {{ Route::is('admin.admins.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.admins.create') }}">Create Admin</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endif


                {{-- Role --}}
                @if (
                    $userGuard->can('role.view') ||
                        $userGuard->can('role.create') ||
                        $userGuard->can('role.edit') ||
                        $userGuard->can('role.delete'))
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Role's</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.roles.create') || Route::is('admin.roles.edit') || Route::is('admin.roles.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('role.view'))
                                    <a {{ Route::is('admin.roles.edit') || Route::is('admin.roles.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.roles.index') }}">Role's</a>
                                @endif
                                @if ($userGuard->can('role.create'))
                                    <a {{ Route::is('admin.roles.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.roles.create') }}">Create Role</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="sidebar-title">Raise Support</li>

                <li class="sidebar-item  ">

                    <form method="POST" action="{{ route('admin.logout.submit') }}" x-data>
                        @csrf
                        <button type="submit" class="btn-primary bi-emoji-frown-fill text-uppercase p-1"> Log
                            Out</button>
                    </form>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>