@extends('template.user.layouts.app')

@section('css')
    {{-- Original Page-Specific Styles --}}
    <style>
        .visa-content {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.8;
            color: #333;
            font-size: 16px;
        }

        .visa-content h4 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .visa-content .visa-options {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 5px solid #007bff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .visa-content .option {
            margin-bottom: 20px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
        }

        .visa-content .option:last-child {
            margin-bottom: 0;
        }

        .visa-content .option h4 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .visa-content .option p {
            margin-bottom: 0;
            font-weight: 500;
            color: #495057;
        }

        .visa-content .requirements {
            background: #e8f4fd;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 5px solid #28a745;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .visa-content .requirements h4 {
            color: #28a745;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .visa-content .requirements ul {
            margin: 0;
            padding-left: 25px;
        }

        .visa-content .requirements li {
            margin-bottom: 10px;
            color: #495057;
            font-weight: 500;
        }

        .visa-content .note {
            background: #fff3cd;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid #ffc107;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .visa-content .note p {
            margin-bottom: 0;
            color: #856404;
            font-weight: 500;
        }

        .visa-content .payment {
            background: #d1ecf1;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid #17a2b8;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .visa-content .payment p {
            margin-bottom: 0;
            color: #0c5460;
            font-weight: 500;
        }

        .price-display h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .price-features .feature-item {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .summary-item {
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-item .fw-bold {
            color: #495057;
        }

        .info-item {
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item .fw-bold {
            color: #495057;
            font-size: 0.9rem;
        }

        .info-item .text-muted {
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {

            .visa-content .visa-options,
            .visa-content .requirements {
                padding: 20px;
            }

            .visa-content .option {
                padding: 15px;
            }

            .price-display h2 {
                font-size: 2.5rem;
            }

            .card-body {
                padding: 20px;
            }
        }
    </style>

    {{-- CRITICAL CSS OVERRIDE BLOCK TO FIX GLOBAL STYLESHEET CONFLICTS --}}
    <style>
        /*
                    * CARD LAYOUT FIX: Reset width to allow Bootstrap's grid to work.
                    */
        .visa-details-page .card {
            width: auto !important;
        }

        /*
                    * CARD BODY ALIGNMENT FIX: Reset display and text alignment for proper layout.
                    */
        .visa-details-page .card-body {
            display: block !important;
            text-align: left !important;
            align-items: initial !important;
        }

        /*
                    * TEXT COLOR FIX: Restore the correct color for muted text.
                    */
        .visa-details-page .text-muted {
            color: #6c757d !important;
        }
    </style>
@endsection


@section('content')
    <!-- We add the 'visa-details-page' class here to scope our CSS fixes -->
    <div class="container-fluid py-5 visa-details-page" style="background: #f8f9fa; min-height: 100vh;">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">{{ __('translation.home') }}</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/visas"
                            class="text-decoration-none">{{ __('translation.visas') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $visa->name }}</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold text-primary mb-3">{{ $visa->name }}</h1>
                        <p class="lead text-muted">{{ $visa->country->name }}</p>
                        <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
                            <span class="badge bg-primary fs-6 px-4 py-2">{{ $visa->visaType->name }}</span>
                            <span class="badge bg-success fs-6 px-4 py-2">{{ __('translation.available') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Visa Description Card -->
                    <div class="card border-0 shadow-lg mb-4">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i>{{ __('translation.visa_details') }}
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            @if ($visa->description)
                                <div class="visa-content">
                                    {!! $visa->description !!}
                                </div>
                            @else
                                <p class="text-muted">{{ __('translation.no_description_available') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Requirements Card -->
                    <div class="card border-0 shadow-lg mb-4">
                        <div class="card-header bg-warning text-dark">
                            <h4 class="mb-0"><i
                                    class="fas fa-clipboard-list me-2"></i>{{ __('translation.requirements') }}</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-primary mb-3">{{ __('translation.required_documents') }}</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i
                                                class="fas fa-check-circle text-success me-2"></i>{{ __('translation.passport_valid_8_months') }}
                                        </li>
                                        <li class="mb-2"><i
                                                class="fas fa-check-circle text-success me-2"></i>{{ __('translation.personal_photo') }}
                                        </li>
                                        <li class="mb-2"><i
                                                class="fas fa-check-circle text-success me-2"></i>{{ __('translation.completed_application') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-primary mb-3">{{ __('translation.processing_time') }}</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-clock text-warning me-2"></i>
                                        <span class="fw-bold">{{ __('translation.typical_processing') }}: 20-40
                                            {{ __('translation.days') }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-exclamation-triangle text-info me-2"></i>
                                        <span class="text-muted">{{ __('translation.processing_may_vary') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Actions -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0"><i class="fas fa-phone me-2"></i>{{ __('translation.contact_us') }}</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="https://wa.me/+970567067187" class="btn btn-success btn-lg w-100">
                                        <i class="fab fa-whatsapp me-2"></i>
                                        {{ __('translation.contact_whatsapp') }}
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="tel:+970567067187" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-phone me-2"></i>
                                        {{ __('translation.call_now') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Price Card -->
                    <div class="card border-0 shadow-lg mb-4">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="mb-0"><i class="fas fa-dollar-sign me-2"></i>{{ __('translation.visa_pricing') }}
                            </h4>
                        </div>
                        <div class="card-body text-center p-4">
                            <div class="price-display mb-3">
                                <h2 class="text-primary fw-bold mb-0">${{ number_format($visa->cost) }}</h2>
                                <p class="text-muted mb-0">{{ __('translation.starting_from') }}</p>
                            </div>
                            <div class="price-features">
                                <div class="feature-item d-flex align-items-center justify-content-center mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>{{ __('translation.all_fees_included') }}</span>
                                </div>
                                <div class="feature-item d-flex align-items-center justify-content-center mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>{{ __('translation.no_hidden_costs') }}</span>
                                </div>
                                <div class="feature-item d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>{{ __('translation.transparent_pricing') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visa Summary Card -->
                    <div class="card border-0 shadow-lg mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>{{ __('translation.visa_summary') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="summary-item mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">{{ __('translation.visa_type') }}:</span>
                                    <span class="badge bg-primary">{{ $visa->visaType->name }}</span>
                                </div>
                            </div>
                            <div class="summary-item mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">{{ __('translation.country') }}:</span>
                                    <span>{{ $visa->country->name }}</span>
                                </div>
                            </div>
                            <div class="summary-item mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">{{ __('translation.duration') }}:</span>
                                    <span>{{ __('translation.varies_by_type') }}</span>
                                </div>
                            </div>
                            <div class="summary-item mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">{{ __('translation.status') }}:</span>
                                    <span class="badge bg-success">{{ __('translation.available') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Country Info Card -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="fas fa-globe me-2"></i>{{ __('translation.country_info') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-globe2 me-3 text-primary"></i>
                                    <div>
                                        <div class="fw-bold">{{ __('translation.country_iso') }}</div>
                                        <div class="text-muted">{{ $visa->country->country_iso }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-currency-exchange me-3 text-warning"></i>
                                    <div>
                                        <div class="fw-bold">{{ __('translation.currency') }}</div>
                                        <div class="text-muted">{{ $visa->country->currency_name }}
                                            ({{ $visa->country->currency_iso }})</div>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone-forward me-3 text-success"></i>
                                    <div>
                                        <div class="fw-bold">{{ __('translation.country_code') }}</div>
                                        <div class="text-muted">{{ $visa->country->country_code }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Visas -->
            @if ($relatedVisas->count() > 0)
                <div class="related-visas mt-5">
                    <h3 class="mb-4 text-center">{{ __('translation.related_visas') }}</h3>
                    <div class="row g-4">
                        @foreach ($relatedVisas as $relatedVisa)
                            <div class="col-md-6 col-lg-4">
                                <div class="card border-0 shadow-lg h-100">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h5 class="card-title mb-1">{{ $relatedVisa->name }}</h5>
                                                <p class="text-muted mb-0">{{ $relatedVisa->country->name }}</p>
                                            </div>
                                            <span class="badge bg-primary">{{ $relatedVisa->visa_type }}</span>
                                        </div>
                                        <div class="text-center mb-3">
                                            <h4 class="text-primary fw-bold mb-0">${{ number_format($relatedVisa->cost) }}
                                            </h4>
                                            <small class="text-muted">{{ __('translation.starting_from') }}</small>
                                        </div>
                                        <a href="/visas/{{ $relatedVisa->slug }}" class="btn btn-outline-primary w-100">
                                            {{ __('translation.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
