@php
    $userGuard = Auth::guard('web')->user();
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

{{--                 Seeker Education --}}
                @role ('Super Admin')
                <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Category</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.categories.create') || Route::is('admin.categories.edit') || Route::is('admin.categories.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                    <a {{ Route::is('admin.categories.edit') || Route::is('admin.categories.index') ? 'style=color:#435ebe;' : '' }}
                                       href="{{ route('admin.categories.index') }}">Category</a>
                                    <a {{ Route::is('admin.categories.create') ? 'style=color:#435ebe;' : '' }}
                                       href="{{ route('admin.categories.create') }}">Create Category</a>
                            </li>
                        </ul>
                    </li>
                @endrole

{{--                 Job Post --}}
                @role ('Agent')
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Job</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.jobs.create') || Route::is('admin.jobs.edit') || Route::is('admin.jobs.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                    <a {{ Route::is('admin.jobs.edit') || Route::is('admin.jobs.index') ? 'style=color:#435ebe;' : '' }}
                                       href="{{ route('admin.jobs.index') }}">Job</a>
                                    <a {{ Route::is('admin.jobs.create') ? 'style=color:#435ebe;' : '' }}
                                       href="{{ route('admin.jobs.create') }}">Create Job</a>
                            </li>
                        </ul>
                    </li>
                @endrole

{{--                --}}{{-- Seeker Experience --}}


                {{-- User --}}
                @role ('Super Admin')
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>User's</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.users.create') || Route::is('admin.users.edit') || Route::is('admin.users.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('user.view'))
                                    <a {{ Route::is('admin.users.edit') || Route::is('admin.users.index') ? 'style=color:#435ebe;' : '' }}
                                       href="{{ route('admin.users.index') }}">User's</a>
                                @endif
                                @if ($userGuard->can('user.create'))
                                    <a {{ Route::is('admin.users.create') ? 'style=color:#435ebe;' : '' }}
                                       href="{{ route('admin.users.create') }}">Create User</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endrole

{{--                <li class="sidebar-title">Raise Support</li>--}}

                <li class="sidebar-item  ">

                    <form method="POST" action="{{ route('admin.logout.submit') }}" x-data>
                        @csrf
                        <button type="submit" class="btn-primary bi-emoji-frown-fill text-uppercase p-1"> Log
                            Out
                        </button>
                    </form>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
