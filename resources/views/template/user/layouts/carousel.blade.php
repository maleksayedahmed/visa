<!-- Carousel Start -->
@if (isset($sliders))

    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">



            <ol class="carousel-indicators">

                @foreach ($sliders as $item)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $loop->iteration - 1 }}"
                        class="{{ $loop->iteration - 1 == 0 ? 'active' : '' }}"></li>
                @endforeach


            </ol>
            <div class="carousel-inner" role="listbox">

                @foreach ($sliders as $item)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ $item->getFirstMedia('slider') ? '/media/' . $item->getFirstMedia('slider')->id . '/' . $item->getFirstMedia('slider')->file_name : '' }}
"
                            class="img-fluid" alt="{{ __('translation.image') }}">
                        <div class="carousel-caption">
                            <div class="text-center p-4" style="max-width: 900px;">
                                {{-- <h4 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">{{ __('translation.solution_for_all_visas') }}</h4> --}}
                                <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp"
                                    data-wow-delay="0.3s">{{ $item->title }}</h1>
                                <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">
                                    {{ $item->description }}</p>
                                {{-- <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5 wow fadeInUp" data-wow-delay="0.7s" href="#">{{ __('translation.more_details') }}</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach



                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s"
                        aria-hidden="false"></span>
                    <span class="visually-hidden-focusable">{{ __('translation.previous') }}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s"
                        aria-hidden="false"></span>
                    <span class="visually-hidden-focusable">{{ __('translation.next') }}</span>
                </button>






                {{-- <div class="carousel-item active">
                <img src="{{ asset('assets/img/carousel-1.jpg') }}" class="img-fluid" alt="{{ __('translation.image') }}">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">{{ __('translation.solution_for_all_visas') }}</h4>
                        <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">{{ __('translation.immigration_process_starts') }}</h1>
                        <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">{{ __('translation.lorem_ipsum_description') }}</p>
                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5 wow fadeInUp" data-wow-delay="0.7s" href="#">{{ __('translation.more_details') }}</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/carousel-2.jpg') }}" class="img-fluid" alt="{{ __('translation.image') }}">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">{{ __('translation.solution_for_all_visas') }}</h5>
                        <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">{{ __('translation.best_visa_immigration_services') }}</h1>
                        <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">{{ __('translation.lorem_ipsum_description') }}</p>
                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5 wow fadeInUp" data-wow-delay="0.7s" href="#">{{ __('translation.more_details') }}</a>
                    </div>
                </div>
            </div>
        </div> --}}

            </div>
        </div>
        <!-- Carousel End -->
@endif
