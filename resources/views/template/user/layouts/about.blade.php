<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="bg-light rounded">
                    <img src="{{ asset('assets/img/about-2.png') }}" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">
                    <img src="{{ asset('assets/img/about-3.jpg') }}" class="img-fluid w-100 border-bottom border-5 border-primary" style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">
                </div>
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                <h5 class="sub-title pe-3">About the company</h5>
                <h1 class="display-5 mb-4">We’re Trusted Immigration Consultant Agency.</h1>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt architecto consectetur iusto perferendis blanditiis assumenda dignissimos, commodi fuga culpa earum explicabo libero sint est mollitia saepe! Sequi asperiores rerum nemo!</p>
                <div class="row gy-4 align-items-center">
                    <div class="col-12 col-sm-6 d-flex align-items-center">
                        <i class="fas fa-map-marked-alt fa-3x text-secondary"></i>
                        <h5 class="ms-4">Best Immigration Resources</h5>
                    </div>
                    <div class="col-12 col-sm-6 d-flex align-items-center">
                        <i class="fas fa-passport fa-3x text-secondary"></i>
                        <h5 class="ms-4">Return Visas Available</h5>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="bg-light text-center rounded p-3">
                            <div class="mb-2">
                                <i class="fas fa-ticket-alt fa-4x text-primary"></i>
                            </div>
                            <h1 class="display-5 fw-bold mb-2">34</h1>
                            <p class="text-muted mb-0">Years of Experience</p>
                        </div>
                    </div>
                    <div class="col-8 col-md-9">
                        <div class="mb-5">
                            <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Offer 100% Genuine Assistance</p>
                            <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> It’s Faster & Reliable Execution</p>
                            <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Accurate & Expert Advice</p>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                <a href="#" class="position-relative wow tada" data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt text-primary fa-3x"></i>
                                    <div class="position-absolute" style="top: 0; left: 25px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="text-primary">Have any questions?</span>
                                <span class="text-secondary fw-bold fs-5" style="letter-spacing: 2px;">Free: <a href="tel:{{getSetting()->mobile_number}}">  {{getSetting()->mobile_number}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
