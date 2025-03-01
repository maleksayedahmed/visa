<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Nik Patel</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <a href="pages-profile.html" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="settings" class="icon-dual icon-xs me-1"></i><span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i><span>Support</span>
                    </a>
                    <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                        <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <!-- <li class="menu-title">Navigation</li> -->

                <li>
                    <a href="{{ route('dashboard') }}">
                        {{-- <span class="badge bg-success float-end">02</span> --}}
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                        <!-- <span class="menu-arrow"></span> -->
                    </a>

                </li>

                <li class="menu-title mt-2"></li>

                <li>
                    <a href="{{ route('admin.countries.index') }}">
                        <i class="uil-windsock"></i>
                        <span> @lang('attributes.countries') </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.cities.index') }}">
                        <i class="bi-globe"></i>
                        <span> @lang('attributes.cities') </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="uil-puzzle-piece"></i>
                        <span> @lang('attributes.categories') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blogs.index') }}">
                        <i class="uil-layer-group"></i>
                        <span> @lang('attributes.blogs') </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="uil-users-alt"></i>
                        <span> @lang('attributes.users') </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="uil-keyhole-square"></i>
                        <span> @lang('attributes.roles') </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.sliders.index') }}">
                        <i class="uil-sliders-v-alt"></i>
                        <span> @lang('attributes.sliders') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tags.index') }}">
                        <i class="uil-comment-plus"></i>
                        <span> @lang('attributes.tags') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.visas.index') }}">
                        <i class="uil-comment-plus"></i>
                        <span> @lang('attributes.visas') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.visatypes.index') }}">
                        <i class="uil-comment-plus"></i>
                        <span> @lang('attributes.visatypes') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.comments.index') }}">
                        <i class="uil-comment-plus"></i>
                        <span> @lang('attributes.comments') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.index') }}">
                        <i class="uil-bright"></i>
                        <span> @lang('attributes.settings') </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
