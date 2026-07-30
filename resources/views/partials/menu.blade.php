<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('panel.home')}}" class="nav-link {{ request()->is("panel/dashboard") || request()->is("panel/dashboard/*") ? "active" : "" }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @can("imtex_visitors_access")
        <li class="nav-item">
            <a href="{{ route('panel.imtex-visitor.index') }}" class="nav-link {{ request()->is("panel/imtex-visitor*") ? "active" : "" }}">
                <p>
                    <i class="nav-icon fas fa-hotel">
                    </i>
                    <p>IMTEX Reservations</p>
                </p>
            </a>
        </li>
        @endcan
        @can("imtex_visitors_access")
        <li class="nav-item">
            <a href="{{ route('panel.seafood.index') }}" class="nav-link {{ request()->is("panel/seafood*") ? "active" : "" }}">
                <p>
                    <i class="nav-icon fas fa-hotel">
                    </i>
                    <p>Sea Food Reservations</p>
                </p>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('panel.pmtx-visitor.index') }}" class="nav-link {{ request()->is("panel/pmtx-visitor*") ? "active" : "" }}">
                <p>
                    <i class="nav-icon fas fa-hotel">
                    </i>
                    <p>PMTX Reservations</p>
                </p>
            </a>
        </li>
        @can("report_access")
            <li class="nav-item">
                <a href="{{ route('panel.reports.index') }}" class="nav-link {{ request()->is("panel/reports*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-file-alt">
                        </i>
                        <p>Reports</p>
                    </p>
                </a>
            </li>
        @endcan
        @can("advance_report_access")
            <li class="nav-item">
                <a href="{{ route('panel.advance-report.index') }}" class="nav-link {{ request()->is("panel/advance-report*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-file-export">
                        </i>
                        <p>Advance Report</p>
                    </p>
                </a>
            </li>
        @endcan
        @can("inquiry-access")
            <li class="nav-item">
                <a href="{{ route('panel.enquiry.index') }}" class="nav-link {{ request()->is("panel/enquiry*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-question-circle">
                        </i>
                        <p>Inquiry</p>
                    </p>
                </a>
            </li>
        @endcan

        @can("deal-access")
            <li class="nav-item">
                <a href="{{ route('panel.deals.index') }}" class="nav-link {{ request()->is("panel/deals*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-thumbs-up">
                        </i>
                        <p>Deal</p>
                    </p>
                </a>
            </li>
        @endcan
        @can("property-access")
            <li class="nav-item">
                <a href="{{ route('panel.property.index') }}" class="nav-link {{ request()->is("panel/property*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-building">
                        </i>
                        <p>Properties</p>
                    </p>
                </a>
            </li>
        @endcan

        @can("blog-access")
            <li class="nav-item">
                <a href="{{ route('panel.blogs.index') }}" class="nav-link {{ request()->is("panel/blogs*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-blog">
                        </i>
                        <p>Blogs</p>
                    </p>
                </a>
            </li>
        @endcan

        @can("partner-request-access")
            <li class="nav-item">
                <a href="{{ route('panel.partner-request.index') }}" class="nav-link {{ request()->is("panel/partner-request*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-user-check">
                        </i>
                        <p>Partner Request</p>
                    </p>
                </a>
            </li>
        @endcan

        @can("user-management-access")
        <li class="nav-item {{ request()->is("panel/user-managment*") ? "menu-open" : "" }}  {{ request()->is("panel/supervisor*") ? "menu-open" : "" }} {{ request()->is("panel/sales-agent*") ? "menu-open" : "" }}">
            <a href="#" class="nav-link {{ request()->is("panel/user-managment*") ? "active" : "" }} {{ request()->is("panel/supervisor*") ? "active" : "" }} {{ request()->is("panel/sales-agent*") ? "active" : "" }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can("user-management-access")
                <li class="nav-item">
                    <a href="{{route('panel.user-managment.index')}}" class="nav-link {{ request()->is("panel/user-managment*") ? "active" : "" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
                @endcan
                <!-- @can("supervisor-access")
                <li class="nav-item">
                    <a href="{{route('panel.supervisor.index')}}" class="nav-link {{ request()->is("panel/supervisor*") ? "active" : "" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supervisor</p>
                    </a>
                </li>
                @endcan
                @can("salesagent-access")
                <li class="nav-item">
                    <a href="{{route('panel.sales-agent.index')}}" class="nav-link {{ request()->is("panel/sales-agent*") ? "active" : "" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sales Agents</p>
                    </a>
                </li>
                @endcan -->
            </ul>
        </li>
        @endcan
        @can("seo_access")
            <li class="nav-item">
                <a href="{{ route('panel.seo-optimization.index') }}" class="nav-link {{ request()->is("panel/seo-optimization*") ? "active" : "" }}">
                    <p>
                        <i class="nav-icon fas fa-user-tag">
                        </i>
                        <p>SEO Optimization</p>
                    </p>
                </a>
            </li>
        @endcan
        @can("access-permission-management")
        <li class="nav-item {{ request()->is("panel/role-permissions*") ? "menu-open" : "" }}">
            <a href="#" class="nav-link {{ request()->is("panel/role-permissions*") ? "active" : "" }}">
                <i class="nav-icon fas fa-ban"></i>
                <p>
                    Permission Mana..
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('panel.role-permissions.index')}}" class="nav-link {{ request()->is("panel/role-permissions*") ? "active" : "" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Role Permission</p>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('panel.change-user-password') }}" class="nav-link {{ request()->is("panel/change-user-password*") ? "active" : "" }}">
                <p>
                    <i class="nav-icon fas fa-user-edit">
                    </i>
                    <p>Change Password</p>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit() ">
                <p>
                    <i class="fas fa-fw fa-sign-out-alt nav-icon">

                    </i>
                    <p>Logout</p>
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>