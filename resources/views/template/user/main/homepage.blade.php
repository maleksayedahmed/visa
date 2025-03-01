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
                    <p class="mb-0">Navigating the complexities of immigration can be challenging, but we're here to make the process smooth and successful. Whether you're looking for a job abroad, expanding your business, or traveling for diplomatic purposes, we provide expert guidance to help you secure the right visa with ease.</p>
                </div>

                <div class="row g-4">

                    @foreach ($categories as $item)


                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="{{ $item->getFirstMedia('category') ? '/media/' . $item->getFirstMedia('category')->id . '/' . $item->getFirstMedia('category')->file_name : '' }}
" class="img-fluid w-100 rounded" alt="Image">
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
                                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5" href="/category/{{$item->id}}">Explore More</a>
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
            <p class="mb-0">We provide personalized immigration solutions to make your journey smoother and hassle-free. Our expert team ensures that you get the best assistance for a successful visa application process, tailored to your specific needs.</p>
        </div>
        <div class="row g-4 justify-content-center text-center">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item text-center p-4">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-dollar-sign fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Cost-Effective</h5>
                        <p class="mb-3">Affordable visa solutions designed to save you time and money while ensuring a smooth application process.</p>
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
                        <p class="mb-3">Expert guidance at every step of your visa application, from documentation to approval.</p>
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
                        <p class="mb-3">We streamline the application process to ensure quicker approvals and minimize delays.</p>
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
                        <p class="mb-3">We help you prepare for interviews with immigration officers to increase your chances of approval.</p>
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
            <p class="mb-0">We provide expert immigration and visa services for various destinations worldwide. Our dedicated team ensures a seamless and stress-free process, helping you secure the right visa for your needs.</p>
        </div>
        <div class="row g-4 text-center">

            @foreach ($countries as $item)

            <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="country-item">
                    <div class="rounded overflow-hidden">
                        <img src="{{ $item->getFirstMedia('country_cover') ? '/media/' . $item->getFirstMedia('country_cover')->id . '/' . $item->getFirstMedia('country_cover')->file_name : '' }}
" class="img-fluid w-100 rounded" alt="Image">
                    </div>
                    <div class="country-flag">
                        <img src="{{ $item->getFirstMedia('country') ? '/media/' . $item->getFirstMedia('country')->id . '/' . $item->getFirstMedia('country')->file_name : '' }}
" class="img-fluid rounded-circle" alt="Image">
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
            <p class="mb-0">We take pride in delivering exceptional visa and immigration services. Hear what our satisfied clients have to say about their experience with us.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow zoomInDown" data-wow-delay="0.2s">
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">The visa application process was incredibly smooth, thanks to their expert guidance. They handled all the paperwork efficiently, and I got my visa approved without any hassle. Highly recommended!</p>
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
                        <h5>Emily Davis</h5>
                        <p class="mb-0">Business Owner</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">Professional and reliable service! They provided great support in obtaining my business visa, ensuring all documents were in order. A minor delay, but overall, a great experience.</p>
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
                        <h5>lily Smith</h5>
                        <p class="mb-0">Student</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">I was worried about getting my student visa, but their team made it easy. They walked me through every step and provided excellent advice. I’m now studying abroad stress-free!</p>
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
                        <h5>Michael Lee</h5>
                        <p class="mb-0">Software Engineer</p>
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
