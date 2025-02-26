<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <h1 class="display-5 text-secondary m-0">
                <img src="{{ asset('assets/img/brand-logo.png') }}" class="img-fluid" alt="">Travisa
            </h1>
            <!-- <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('visas') }}" class="nav-item nav-link {{ Request::is('visas') ? 'active' : '' }}">Visas</a>
                <a href="{{ url('blogs') }}" class="nav-item nav-link {{ Request::is('blogs') ? 'active' : '' }}">Blogs</a>
                <a href="{{ url('service') }}" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Service</a>
                <a href="{{ url('countries') }}" class="nav-item nav-link {{ Request::is('countries') ? 'active' : '' }}">Countries</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown"><span class="dropdown-toggle">Pages</span></a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('feature') }}" class="dropdown-item">Feature</a>
                        <a href="{{ url('countries') }}" class="dropdown-item">Countries</a>
                        <a href="{{ url('testimonial') }}" class="dropdown-item">Testimonial</a>
                        <a href="{{ url('training') }}" class="dropdown-item">Training</a>
                        <a href="{{ url('404') }}" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                {{-- <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a> --}}
            </div>
            {{-- <button class="btn btn-primary btn-md-square border-secondary mb-3 mb-md-3 mb-lg-0 me-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fas fa-search"></i>
            </button> --}}
            <a href="https://wa.me/+970567067187" class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">Get A Quote</a>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->
