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
                <li>
                    <a href="{{ route('admin.cities.index') }}">
                        <i class="bi-globe"></i>
                        <span> @lang('attributes.cities') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.areas.index') }}">
                        <i class="uil-comment-image"></i>
                        <span> @lang('attributes.areas') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="uil-puzzle-piece"></i>
                        <span> @lang('attributes.categories') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.brands.index') }}">
                        <i class="uil-award"></i>
                        <span> @lang('attributes.brands') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.offers.index') }}">
                        <i class="uil-chart-line"></i>
                        <span> @lang('attributes.offers') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.doctor_specializations.index') }}">
                        <i class="uil-medkit"></i>
                        <span> @lang('attributes.doctor_specializations') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.doctors.index') }}">
                        <i class="uil-user"></i>
                        <span> @lang('attributes.doctors') </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.coupons.index') }}">
                        <i class="uil-ticket"></i>
                        <span> @lang('attributes.coupons') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}">
                        <i class="uil-window-restore"></i>
                        <span> @lang('attributes.products') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.model-types.index') }}">
                        <i class="uil-lightbulb-alt"></i>
                        <span> model types </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.model-type-data.index') }}">
                        <i class="uil-server"></i>
                        <span> model type data </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.package-offers.index') }}">
                        <i class="uil-gift"></i>
                        <span> @lang('attributes.package_offers') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.companies.index') }}">
                        <i class="uil-store"></i>
                        <span> @lang('attributes.companies') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blogs.index') }}">
                        <i class="uil-layer-group"></i>
                        <span> @lang('attributes.blogs') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.payment_types.index') }}">
                        <i class="uil-dollar-alt"></i>
                        <span> @lang('attributes.payment_types') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pets_categories.index') }}">
                        <i class="uil-coins"></i>
                        <span> @lang('attributes.pets_categories') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pets.index') }}">
                        <i class="uil-flask"></i>
                        <span> @lang('attributes.pets') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="uil-users-alt"></i>
                        <span> @lang('attributes.users') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="uil-keyhole-square"></i>
                        <span> @lang('attributes.roles') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}">
                        <i class="uil-sliders-v-alt"></i>
                        <span> @lang('attributes.services') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.reservations.index') }}">
                        <i class="uil-sliders-v-alt"></i>
                        <span> @lang('attributes.reservations') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sliders.index') }}">
                        <i class="uil-sliders-v-alt"></i>
                        <span> @lang('attributes.sliders') </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
