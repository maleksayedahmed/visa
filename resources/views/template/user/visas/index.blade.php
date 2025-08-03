@extends('template.user.layouts.app')

@section('css')
    <style>
        /* Visa Listing Section */
        .visa-listing-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
            min-height: 100vh !important;
        }

        /* Visa Card Styling */
        .visa-card {
            background: white !important;
            border-radius: 20px !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08) !important;
            overflow: hidden !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            height: 100% !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            margin-bottom: 2rem !important;
        }

        .visa-card:hover {
            transform: translateY(-12px) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12) !important;
        }

        /* Visa Image Styling */
        .visa-image {
            height: 200px !important;
            overflow: hidden !important;
            position: relative !important;
        }

        .visa-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            transition: transform 0.5s ease !important;
        }

        .visa-card:hover .visa-image img {
            transform: scale(1.1) !important;
        }

        .visa-image-placeholder {
            height: 100% !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            color: white !important;
            text-align: center !important;
            padding: 2rem !important;
        }

        .visa-image-placeholder i {
            font-size: 3rem !important;
            margin-bottom: 1rem !important;
            opacity: 0.8 !important;
        }

        .visa-image-placeholder span {
            font-size: 1.1rem !important;
            font-weight: 600 !important;
            opacity: 0.9 !important;
        }

        /* Visa Header */
        .visa-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            padding: 2rem 1.5rem !important;
            position: relative !important;
        }

        .visa-country h4 {
            font-size: 1.4rem !important;
            font-weight: 600 !important;
            margin-bottom: 0.5rem !important;
            color: white !important;
        }

        .visa-country p {
            font-size: 0.95rem !important;
            color: rgba(255, 255, 255, 0.9) !important;
            margin-bottom: 0 !important;
        }

        .visa-type-badge {
            position: absolute !important;
            top: 1.5rem !important;
            right: 1.5rem !important;
        }

        .visa-type-badge .badge {
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 20px !important;
        }

        /* Visa Body */
        .visa-body {
            padding: 2rem 1.5rem !important;
        }

        .visa-price h3 {
            font-size: 2.5rem !important;
            font-weight: 700 !important;
            margin-bottom: 0.5rem !important;
            color: #667eea !important;
        }

        .visa-price p {
            font-size: 0.9rem !important;
            color: #6c757d !important;
            margin-bottom: 0 !important;
        }

        .visa-features {
            margin-top: 1.5rem !important;
        }

        .visa-features .feature-item {
            display: flex !important;
            align-items: center !important;
            margin-bottom: 0.8rem !important;
            font-size: 0.9rem !important;
            color: #495057 !important;
        }

        .visa-features .feature-item i {
            margin-right: 0.8rem !important;
            width: 18px !important;
            font-size: 1rem !important;
        }

        /* Visa Footer */
        .visa-footer {
            padding: 1.5rem !important;
        }

        .visa-footer .btn {
            font-weight: 600 !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 25px !important;
            transition: all 0.3s ease !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none !important;
        }

        .visa-footer .btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3) !important;
        }

        /* Section Title */
        .section-title {
            margin-bottom: 4rem !important;
        }

        .section-title h1 {
            font-size: 3rem !important;
            font-weight: 700 !important;
            margin-bottom: 1rem !important;
            color: #2c3e50 !important;
        }

        .section-title p {
            font-size: 1.1rem !important;
            color: #6c757d !important;
            max-width: 600px !important;
            margin: 0 auto !important;
        }

        .sub-title {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 30px !important;
            font-size: 0.9rem !important;
            font-weight: 600 !important;
            display: inline-block !important;
            margin-bottom: 1rem !important;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3) !important;
        }

        /* Pagination */
        .pagination {
            justify-content: center !important;
        }

        .page-link {
            border-radius: 10px !important;
            margin: 0 0.25rem !important;
            border: none !important;
            color: #667eea !important;
            font-weight: 600 !important;
        }

        .page-link:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .visa-card {
                margin-bottom: 1.5rem !important;
            }

            .section-title h1 {
                font-size: 2.5rem !important;
            }

            .visa-image {
                height: 180px !important;
            }
        }

        @media (max-width: 576px) {
            .section-title h1 {
                font-size: 2rem !important;
            }

            .visa-image {
                height: 160px !important;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Visa Listing Section -->
    <div class="container-fluid visa-listing-section py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">{{ __('translation.visas') }}</h5>
                </div>
                <h1 class="display-5 mb-4">{{ __('translation.all_visa_services') }}</h1>
                <p class="mb-0">{{ __('translation.visa_listing_description') }}</p>
            </div>

            <!-- Visa Grid -->
            <div class="row g-4">
                @foreach ($visas as $visa)
                    <div class="col-lg-6 col-xl-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="visa-card">
                            <!-- Visa Image -->
                            <div class="visa-image">
                                @if ($visa->getFirstMedia('visa_image'))
                                    <img src="{{ $visa->getFirstMedia('visa_image')->getUrl() }}" alt="{{ $visa->name }}"
                                        class="img-fluid w-100">
                                @else
                                    <div class="visa-image-placeholder">
                                        <i class="fas fa-passport"></i>
                                        <span>{{ $visa->country->name }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="visa-header">
                                <div class="visa-country">
                                    <h4 class="text-white mb-0">{{ $visa->name }}</h4>
                                    <p class="text-light mb-0">{{ $visa->country->name }}</p>
                                </div>
                                <div class="visa-type-badge">
                                    <span class="badge bg-primary">{{ $visa->visaType->name }}</span>
                                </div>
                            </div>
                            <div class="visa-body">
                                <div class="visa-price">
                                    <h3 class="text-primary mb-0">${{ number_format($visa->cost) }}</h3>
                                    <p class="text-muted mb-0">{{ __('translation.starting_from') }}</p>
                                </div>
                                <div class="visa-features">
                                    <div class="feature-item">
                                        <i class="fas fa-clock text-primary"></i>
                                        <span>{{ __('translation.fast_processing') }}</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>{{ __('translation.guaranteed_approval') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="visa-footer">
                                <a href="/visas/{{ $visa->slug }}" class="btn btn-primary w-100">
                                    {{ __('translation.view_details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($visas->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Page navigation">
                        {{ $visas->links() }}
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection
