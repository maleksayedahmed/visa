 @extends('template.user.layouts.app')

@section('content')
    <div class="container-fluid features overflow-hidden py-5">
            <div class="container py-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-5 fw-bold mb-4 text-white">{{ $visa->name }}</h1>
                    <p class="lead text-light mb-5">{{ $visa->description }}</p>

                    <div class="visa-country-info mx-auto p-4 px-5 rounded-4 shadow-lg border position-relative animate-fade" 
                        style="max-width: 600px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(12px); transition: all 0.4s ease;">
                        <div class="mb-4 text-white d-flex flex-column gap-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-globe2 me-3 fs-3 text-primary"></i>
                                <div>
                                    <div class="fw-bold fs-5">Country ISO</div>
                                    <div class="fs-5 fw-semibold text-white">{{ $visa->country->country_iso }}</div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <i class="bi bi-currency-exchange me-3 fs-3 text-warning"></i>
                                <div>
                                    <div class="fw-bold fs-5">Currency</div>
                                    <div class="fs-5 fw-semibold text-white">{{ $visa->country->currency_name }} ({{ $visa->country->currency_iso }})</div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <i class="bi bi-telephone-forward me-3 fs-3 text-success"></i>
                                <div>
                                    <div class="fw-bold fs-5">Country Code</div>
                                    <div class="fs-5 fw-semibold text-white">{{ $visa->country->country_code }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 justify-content-center text-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="feature-item text-center p-4">
                            <div class="feature-icon p-3 mb-4">
                                <i class="fas fa-dollar-sign fa-4x text-primary"></i>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-3">{{$visa->cost}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="feature-item text-center p-4">
                            <div class="feature-icon p-3 mb-4">
                                <i class="fab fa-cc-visa fa-4x text-primary"></i>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-3">{{$visa->visa_type}}</h5>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="https://wa.me/+970567067187" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Buy now!</a>
                    </div>
                </div>
            </div>
        </div>

@endsection


