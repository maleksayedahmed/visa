@extends('template.user.layouts.app')

@section('content')

        <!-- Counter Facts Start -->
        <div class="container-fluid counter-facts py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="fas fa-passport"></i>
                            </div>
                            <div class="counter-content">
                                <h3>Visa Categories</h3>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value" data-toggle="counter-up">31</span>
                                    <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="counter-content">
                                <h3>Team Members</h3>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value" data-toggle="counter-up">377</span>
                                    <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <div class="counter-content">
                                <h3>Visa Process</h3>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value" data-toggle="counter-up">4.9</span>
                                    <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">K</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="counter-content">
                                <h3>Success Rates</h3>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value" data-toggle="counter-up">98</span>
                                    <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Facts End -->


        <!-- Services Start -->
        <div class="container-fluid service overflow-hidden pt-5">
            <div class="container py-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Visa Categories</h5>
                    </div>
                    <h1 class="display-5 mb-4">Enabling Your Immigration Successfully</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
                </div>

                <div class="row g-4">

                    @foreach ($categories as $item)


                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="{{ $item->getFirstMediaUrl('category') }}" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a href="#" class="h4 text-white mb-0">{{$item->name}}</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="/category/{{$item->id}}">Explore More</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a href="#"><h4 class="text-white mb-4 py-3">{{$item->name}}</h4></a>
                                        <div class="px-4">
                                            <p class="mb-4">{{$item->description}}</p>
                                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="#">Explore More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach




                </div>
        <!-- Services End -->



        <!-- Features Start -->
<div class="container-fluid features overflow-hidden py-5">
    <div class="container">
        <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h5 class="sub-title text-primary px-3">Why Choose Us</h5>
            </div>
            <h1 class="display-5 mb-4">Offer Tailor Made Services That Our Client Requires</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
        </div>
        <div class="row g-4 justify-content-center text-center">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item text-center p-4">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-dollar-sign fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Cost-Effective</h5>
                        <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="feature-item text-center p-4">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fab fa-cc-visa fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Visa Assistance</h5>
                        <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="feature-item text-center p-4">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-atlas fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Faster Processing</h5>
                        <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="feature-item text-center p-4">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-users fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Direct Interviews</h5>
                        <p class="mb-3">Dolor, sit amet consectetur adipisicing elit. Soluta inventore cum accusamus,</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Features End -->



        <!-- Countries We Offer Start -->
<div class="container-fluid country overflow-hidden py-5">
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 70px;">
            <div class="sub-style">
                <h5 class="sub-title text-primary px-3">COUNTRIES WE OFFER</h5>
            </div>
            <h1 class="display-5 mb-4">Immigration & visa services following Countries</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
        </div>
        <div class="row g-4 text-center">

            @foreach ($countries as $item)

            <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="country-item">
                    <div class="rounded overflow-hidden">
                        <img src="{{ $item->getFirstMediaUrl('country_cover') }}" class="img-fluid w-100 rounded" alt="Image">
                    </div>
                    <div class="country-flag">
                        <img src="{{ $item->getFirstMediaUrl('country') }}" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div class="country-name">
                        <a href="/countries/{{$item->id}}" class="text-white fs-4">{{$item->name}}</a>
                    </div>
                </div>
            </div>

            @endforeach



            <div class="col-12">
                <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="/countries">More Countries</a>
            </div>
        </div>
    </div>
</div>
<!-- Countries We Offer End -->


        <!-- Testimonial Start -->
<div class="container-fluid testimonial overflow-hidden pb-5">
    <div class="container py-5">
        <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h5 class="sub-title text-primary px-3">OUR CLIENTS REVIEWS</h5>
            </div>
            <h1 class="display-5 mb-4">What Our Clients Say</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow zoomInDown" data-wow-delay="0.2s">
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitati eiusmod tempor incididunt.</p>
                    <div class="d-flex justify-content-end">
                        <i class="fas fa-star' text-secondary"></i>
                        <i class="fas fa-star' text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                        <img class="img-fluid rounded-circle" src="{{ asset('assets/img/testimonial-1.jpg') }}" alt="img">
                    </div>
                    <div class="my-auto">
                        <h5>Person Name</h5>
                        <p class="mb-0">Profession</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitati eiusmod tempor incididunt.</p>
                    <div class="d-flex justify-content-end">
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                        <img class="img-fluid rounded-circle" src="{{ asset('assets/img/testimonial-2.jpg') }}" alt="img">
                    </div>
                    <div class="my-auto">
                        <h5>Person Name</h5>
                        <p class="mb-0">Profession</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitati eiusmod tempor incididunt.</p>
                    <div class="d-flex justify-content-end">
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                        <img class="img-fluid rounded-circle" src="{{ asset('assets/img/testimonial-3.jpg') }}" alt="img">
                    </div>
                    <div class="my-auto">
                        <h5>Person Name</h5>
                        <p class="mb-0">Profession</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Testimonial End -->


@endsection
