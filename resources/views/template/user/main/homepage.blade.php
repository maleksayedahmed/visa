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
                            {{-- <h3>{{ __('translation.visa_categories') }}</h3> --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">31</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">{{ __('translation.plus') }}</h4>
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
                            <h3>{{ __('translation.team_members') }}</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">377</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">
                                    {{ __('translation.plus') }}</h4>
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
                            <h3>{{ __('translation.visa_process') }}</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">4.9</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">
                                    {{ __('translation.thousand') }}</h4>
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
                            <h3>{{ __('translation.success_rates') }}</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">98</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">
                                    {{ __('translation.percent') }}</h4>
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
                    <h5 class="sub-title text-primary px-3">{{ __('translation.visa_categories') }}</h5>
                </div>
                <h1 class="display-5 mb-4">{{ __('translation.enabling_immigration_successfully') }}</h1>
                <p class="mb-0">{{ __('translation.immigration_description') }}</p>
            </div>

            <div class="row g-4">

                @foreach ($categories as $item)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="{{ $item->getFirstMedia('category') ? '/media/' . $item->getFirstMedia('category')->id . '/' . $item->getFirstMedia('category')->file_name : '' }}
"
                                        class="img-fluid w-100 rounded" alt="{{ __('translation.image') }}">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a href="#" class="h4 text-white mb-0">{{ $item->name }}</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                            href="/category/{{ $item->id }}">{{ __('translation.explore_more') }}</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a href="#">
                                            <h4 class="text-white mb-4 py-3">{{ $item->name }}</h4>
                                        </a>
                                        <div class="px-4">
                                            <p class="mb-4">{{ $item->description }}</p>
                                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5"
                                                href="/category/{{ $item->id }}">{{ __('translation.explore_more') }}</a>
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
                            <h5 class="sub-title text-primary px-3">{{ __('translation.why_choose_us') }}</h5>
                        </div>
                        <h1 class="display-5 mb-4">{{ __('translation.tailor_made_services') }}</h1>
                        <p class="mb-0">{{ __('translation.features_description') }}</p>
                    </div>
                    <div class="row g-4 justify-content-center text-center">
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="feature-item text-center p-4">
                                <div class="feature-icon p-3 mb-4">
                                    <i class="fas fa-dollar-sign fa-4x text-primary"></i>
                                </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-3">{{ __('translation.cost_effective') }}</h5>
                                    <p class="mb-3">{{ __('translation.cost_effective_description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="feature-item text-center p-4">
                                <div class="feature-icon p-3 mb-4">
                                    <i class="fab fa-cc-visa fa-4x text-primary"></i>
                                </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-3">{{ __('translation.visa_assistance') }}</h5>
                                    <p class="mb-3">{{ __('translation.visa_assistance_description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="feature-item text-center p-4">
                                <div class="feature-icon p-3 mb-4">
                                    <i class="fas fa-atlas fa-4x text-primary"></i>
                                </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-3">{{ __('translation.faster_processing') }}</h5>
                                    <p class="mb-3">{{ __('translation.faster_processing_description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="feature-item text-center p-4">
                                <div class="feature-icon p-3 mb-4">
                                    <i class="fas fa-users fa-4x text-primary"></i>
                                </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-3">{{ __('translation.direct_interviews') }}</h5>
                                    <p class="mb-3">{{ __('translation.direct_interviews_description') }}</p>
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
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s"
                        style="margin-bottom: 70px;">
                        <div class="sub-style">
                            <h5 class="sub-title text-primary px-3">{{ __('translation.countries_we_offer') }}</h5>
                        </div>
                        <h1 class="display-5 mb-4">{{ __('translation.immigration_visa_services') }}</h1>
                        <p class="mb-0">{{ __('translation.countries_description') }}</p>
                    </div>
                    <div class="row g-4 text-center">

                        @foreach ($countries as $item)
                            <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="country-item">
                                    <div class="rounded overflow-hidden">
                                        <img src="{{ $item->getFirstMedia('country_cover') ? '/media/' . $item->getFirstMedia('country_cover')->id . '/' . $item->getFirstMedia('country_cover')->file_name : '' }}
"
                                            class="img-fluid w-100 rounded" alt="{{ __('translation.image') }}">
                                    </div>
                                    <div class="country-flag">
                                        <img src="{{ $item->getFirstMedia('country') ? '/media/' . $item->getFirstMedia('country')->id . '/' . $item->getFirstMedia('country')->file_name : '' }}
"
                                            class="img-fluid rounded-circle" alt="{{ __('translation.image') }}">
                                    </div>
                                    <div class="country-name">
                                        <a href="/countries/{{ $item->id }}"
                                            class="text-white fs-4">{{ $item->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                        <div class="col-12">
                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp"
                                data-wow-delay="0.1s" href="/countries">{{ __('translation.more_countries') }}</a>
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
                            <h5 class="sub-title text-primary px-3">{{ __('translation.our_clients_reviews') }}</h5>
                        </div>
                        <h1 class="display-5 mb-4">{{ __('translation.what_our_clients_say') }}</h1>
                        <p class="mb-0">{{ __('translation.testimonials_description') }}</p>
                    </div>
                    <div class="owl-carousel testimonial-carousel wow zoomInDown" data-wow-delay="0.2s">
                        <div class="testimonial-item">
                            <div class="testimonial-content p-4 mb-5">
                                <p class="fs-5 mb-0">{{ __('translation.testimonial_1_text') }}</p>
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
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('assets/img/testimonial-1.jpg') }}"
                                        alt="{{ __('translation.img') }}">
                                </div>
                                <div class="my-auto">
                                    <h5>{{ __('translation.testimonial_1_name') }}</h5>
                                    <p class="mb-0">{{ __('translation.testimonial_1_title') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-content p-4 mb-5">
                                <p class="fs-5 mb-0">{{ __('translation.testimonial_2_text') }}</p>
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
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('assets/img/testimonial-2.jpg') }}"
                                        alt="{{ __('translation.img') }}">
                                </div>
                                <div class="my-auto">
                                    <h5>{{ __('translation.testimonial_2_name') }}</h5>
                                    <p class="mb-0">{{ __('translation.testimonial_2_title') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-content p-4 mb-5">
                                <p class="fs-5 mb-0">{{ __('translation.testimonial_3_text') }}</p>
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
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('assets/img/testimonial-3.jpg') }}"
                                        alt="{{ __('translation.img') }}">
                                </div>
                                <div class="my-auto">
                                    <h5>{{ __('translation.testimonial_3_name') }}</h5>
                                    <p class="mb-0">{{ __('translation.testimonial_3_title') }}</p>
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
