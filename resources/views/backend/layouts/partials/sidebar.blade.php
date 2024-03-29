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
                    <li class="sidebar-item has-sub">
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

                {{-- Company --}}
                @if (
                    $userGuard->can('company.view') ||
                        $userGuard->can('company.create') ||
                        $userGuard->can('company.edit') ||
                        $userGuard->can('company.delete'))
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Companie's</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.companies.create') || Route::is('admin.companies.edit') || Route::is('admin.companies.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('company.view'))
                                    <a {{ Route::is('admin.companies.edit') || Route::is('admin.companies.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.companies.index') }}">Companie's</a>
                                @endif
                                @if ($userGuard->can('company.create'))
                                    <a {{ Route::is('admin.companies.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.companies.create') }}">Create Company</a>
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
                    <li class="sidebar-item has-sub">
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

                {{-- Seeker Education --}}
                @if (
                    $userGuard->can('seekerEducation.view') ||
                        $userGuard->can('seekerEducation.create') ||
                        $userGuard->can('seekerEducation.edit') ||
                        $userGuard->can('seekerEducation.delete'))
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Seeker's Education</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.seekerEducations.create') || Route::is('admin.seekerEducations.edit') || Route::is('admin.seekerEducations.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('seekerEducation.view'))
                                    <a {{ Route::is('admin.seekerEducations.edit') || Route::is('admin.seekerEducations.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerEducations.index') }}">Seeker's Education</a>
                                @endif
                                @if ($userGuard->can('seekerEducation.create'))
                                    <a {{ Route::is('admin.seekerEducations.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerEducations.create') }}">Create Seeker's Education</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Seeker Experience --}}
                @if (
                    $userGuard->can('seekerExperience.view') ||
                        $userGuard->can('seekerExperience.create') ||
                        $userGuard->can('seekerExperience.edit') ||
                        $userGuard->can('seekerExperience.delete'))
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Seeker's Experiences</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.seekerExperiences.create') || Route::is('admin.seekerExperiences.edit') || Route::is('admin.seekerExperiences.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('seekerExperience.view'))
                                    <a {{ Route::is('admin.seekerExperiences.edit') || Route::is('admin.seekerExperiences.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerExperiences.index') }}">Seeker's Experiences</a>
                                @endif
                                @if ($userGuard->can('seekerExperience.create'))
                                    <a {{ Route::is('admin.seekerExperiences.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerExperiences.create') }}">Create Seeker's Experience</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Seeker Experts --}}
                @if (
                    $userGuard->can('seekerExpert.view') ||
                        $userGuard->can('seekerExpert.create') ||
                        $userGuard->can('seekerExpert.edit') ||
                        $userGuard->can('seekerExpert.delete'))
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Seeker's Experts</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.seekerExperts.create') || Route::is('admin.seekerExperts.edit') || Route::is('admin.seekerExperts.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('seekerExpert.view'))
                                    <a {{ Route::is('admin.seekerExperts.edit') || Route::is('admin.seekerExperts.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerExperts.index') }}">Seeker's Experts</a>
                                @endif
                                @if ($userGuard->can('seekerExpert.create'))
                                    <a {{ Route::is('admin.seekerExperts.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerExperts.create') }}">Create Seeker's Experts</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Seeker References --}}
                @if (
                    $userGuard->can('seekerReference.view') ||
                        $userGuard->can('seekerReference.create') ||
                        $userGuard->can('seekerReference.edit') ||
                        $userGuard->can('seekerReference.delete'))
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Seeker's References</span>
                        </a>
                        <ul class="submenu"
                            {{ Route::is('admin.seekerReferences.create') || Route::is('admin.seekerReferences.edit') || Route::is('admin.seekerReferences.index') ? 'style=display:block;' : '' }}>
                            <li class="submenu-item ">
                                @if ($userGuard->can('seekerReference.view'))
                                    <a {{ Route::is('admin.seekerReferences.edit') || Route::is('admin.seekerReferences.index') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerReferences.index') }}">Seeker's References</a>
                                @endif
                                @if ($userGuard->can('seekerReference.create'))
                                    <a {{ Route::is('admin.seekerReferences.create') ? 'style=color:#435ebe;' : '' }}
                                        href="{{ route('admin.seekerReferences.create') }}">Create Seeker's Reference</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- User --}}
                @if (
                    $userGuard->can('user.view') ||
                        $userGuard->can('user.create') ||
                        $userGuard->can('user.edit') ||
                        $userGuard->can('user.delete'))
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
