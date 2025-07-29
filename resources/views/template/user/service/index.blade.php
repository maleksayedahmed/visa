@extends('template.user.layouts.app')

@section('content')
    <div class="container-fluid service overflow-hidden py-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Visa Categories</h5>
                </div>
                <h1 class="display-5 mb-4">Enabling Your Immigration Successfully</h1>
                {{-- <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p> --}}
            </div>

            <div class="row g-4">
                @foreach ($services as $item)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="{{ $item->getFirstMedia('visatype_cover') ? '/media/' . $item->getFirstMedia('visatype_cover')->id . '/' . $item->getFirstMedia('visatype_cover')->file_name : '' }}
"
                                        class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a href="#" class="h4 text-white mb-0">{{ $item->name }}</a>
                                        </div>
                                        <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4"
                                            href="/visas">Explore More</a>
                                    </div>
                                    <div class="service-content pb-4">
                                        <a href="#">
                                            <h4 class="text-white mb-4 py-3">{{ $item->name }}</h4>
                                        </a>
                                        <div class="px-4">
                                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5"
                                                href="/visas">Explore More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
