<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('admin_panel_settings.index') }}" class="nav-link {{ request()->is('admin/generalSettings*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>General Settings</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('finance_calender.index') }}" class="nav-link {{ request()->is('admin/finance_calender*') ? 'active' : '' }}">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Fiscal Years</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('branches.index') }}" class="nav-link {{ request()->is('admin/branches*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-code-branch"></i>
                    <p>Branches</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('ShiftsTypes.index') }}" class="nav-link {{ request()->is('admin/ShiftsTypes*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clock"></i>
                    <p>Shift Types</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('departements.index') }}" class="nav-link {{ request()->is('admin/departements*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Departments</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('jobs_categories.index') }}" class="nav-link {{ request()->is('admin/jobs_categories*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>Job Categories</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Qualifications.index') }}" class="nav-link {{ request()->is('admin/Qualifications*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>Employee Qualifications</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('occasions.index') }}" class="nav-link {{ request()->is('admin/occasions*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-check"></i>
                    <p>Official Occasions</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Resignations.index') }}" class="nav-link {{ request()->is('admin/Resignations*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Resignation Types</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Employees.index') }}" class="nav-link {{ request()->is('admin/Employees*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Employees Data</p>
                </a>
            </li>

        </ul>
    </nav>
</div>