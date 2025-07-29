@extends('template.user.layouts.app')

@section('content')

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">{{ __('translation.countries') }}</h3>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">{{ __('translation.home') }}</a></li>
            <li class="breadcrumb-item active text-secondary">{{ __('translation.countries') }}</li>
        </ol>
    </div>
</div>

<div class="container-fluid country overflow-hidden py-5">
    <div class="container py-5">
        <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 70px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="sub-style">
                <h5 class="sub-title text-primary px-3">COUNTRIES WE OFFER</h5>
            </div>
            <h1 class="display-5 mb-4">Immigration &amp; visa services following Countries</h1>
            <p class="mb-0">We provide expert immigration and visa services for various destinations worldwide. Our dedicated team ensures a seamless and stress-free process, helping you secure the right visa for your needs.</p>
        </div>
        <div class="row g-4 text-center">
            @foreach ($countries as $country)
            @if ($country->status == 1)
            <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="country-item">
                    <div class="rounded overflow-hidden">
                        <img src="{{ $country->getFirstMedia('country_cover') ? '/media/' . $country->getFirstMedia('country_cover')->id . '/' . $country->getFirstMedia('country_cover')->file_name : '' }}
" class="img-fluid w-100 rounded" alt="Image">
                    </div>
                    <div class="country-flag">
                        <img src="{{ $country->getFirstMedia('country') ? '/media/' . $country->getFirstMedia('country')->id . '/' . $country->getFirstMedia('country')->file_name : '' }}
" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div class="country-name">
                        <a href="{{ route('country.show', $country->id) }}" class="text-white fs-4">{{ $country->name }}</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</div>
@endsection
