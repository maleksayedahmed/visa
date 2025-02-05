<div class="container-fluid nav-bar p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <h1 class="display-5 text-secondary m-0">
                <img src="{{ asset('img/brand-logo.png') }}" class="img-fluid" alt=""> Travisa
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('/service') }}" class="nav-item nav-link">Service</a>
                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
</div>
