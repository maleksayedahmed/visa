@extends('template.user.layouts.app')

@section('css')
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box !important;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
            line-height: 1.6 !important;
            overflow-x: hidden !important;
        }

        /* Ensure proper font loading */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        /* Container improvements */
        .container {
            max-width: 1200px !important;
            margin: 0 auto !important;
            padding: 0 15px !important;
        }

        /* Section spacing */
        .py-5 {
            padding-top: 5rem !important;
            padding-bottom: 5rem !important;
        }

        .pt-5 {
            padding-top: 5rem !important;
        }

        .pb-5 {
            padding-bottom: 5rem !important;
        }

        /* Counter Facts Section */
        .counter-facts {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            padding: 4rem 0 !important;
        }

        .counter {
            text-align: center !important;
            padding: 2.5rem 1.5rem !important;
            border-radius: 20px !important;
            background: rgba(255, 255, 255, 0.15) !important;
            backdrop-filter: blur(15px) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            margin-bottom: 1rem !important;
        }

        .counter:hover {
            transform: translateY(-8px) !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2) !important;
            background: rgba(255, 255, 255, 0.2) !important;
        }

        .counter-icon {
            font-size: 3.5rem !important;
            margin-bottom: 1.5rem !important;
            color: #ffd700 !important;
            display: block !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3) !important;
        }

        .counter-value {
            font-size: 3.5rem !important;
            font-weight: 700 !important;
            color: #ffd700 !important;
            display: block !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3) !important;
            margin-bottom: 0.5rem !important;
        }

        .counter h3 {
            font-size: 1.1rem !important;
            font-weight: 600 !important;
            margin-bottom: 1rem !important;
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .counter h4 {
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            color: rgba(255, 255, 255, 0.8) !important;
        }

        /* Services/Visa Types Section */
        .service {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
            padding: 5rem 0 !important;
        }

        .service-item {
            position: relative !important;
            overflow: hidden !important;
            border-radius: 20px !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            height: 420px !important;
            background: white !important;
            margin-bottom: 2rem !important;
        }

        .service-item:hover {
            transform: translateY(-15px) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important;
        }

        .service-inner {
            position: relative !important;
            height: 100% !important;
        }

        .service-img {
            height: 220px !important;
            overflow: hidden !important;
            position: relative !important;
        }

        .service-img img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .service-item:hover .service-img img {
            transform: scale(1.15) !important;
        }

        .service-title {
            position: absolute !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            padding: 2.5rem 2rem !important;
            transform: translateY(100%) !important;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            border-radius: 0 0 20px 20px !important;
        }

        .service-item:hover .service-title {
            transform: translateY(0) !important;
        }

        .service-title-name {
            text-align: center !important;
        }

        .service-title-name h4 {
            font-size: 1.4rem !important;
            font-weight: 600 !important;
            margin-bottom: 1rem !important;
            color: white !important;
        }

        .service-title-name p {
            font-size: 0.95rem !important;
            line-height: 1.6 !important;
            margin-bottom: 1.5rem !important;
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .service-title-name .btn {
            background: rgba(255, 255, 255, 0.2) !important;
            border: 2px solid rgba(255, 255, 255, 0.3) !important;
            color: white !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .service-title-name .btn:hover {
            background: white !important;
            color: #667eea !important;
            transform: translateY(-2px) !important;
        }

        /* Features Section */
        .features {
            background: white !important;
            padding: 5rem 0 !important;
        }

        .feature-item {
            background: white !important;
            border-radius: 20px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            height: 100% !important;
            padding: 2.5rem 2rem !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            position: relative !important;
            overflow: hidden !important;
        }

        .feature-item::before {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 4px !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            transform: scaleX(0) !important;
            transition: transform 0.3s ease !important;
        }

        .feature-item:hover {
            transform: translateY(-8px) !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12) !important;
        }

        .feature-item:hover::before {
            transform: scaleX(1) !important;
        }

        .feature-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-radius: 50% !important;
            width: 90px !important;
            height: 90px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin: 0 auto 1.5rem !important;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3) !important;
            transition: all 0.3s ease !important;
        }

        .feature-item:hover .feature-icon {
            transform: scale(1.1) !important;
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4) !important;
        }

        .feature-icon i {
            color: white !important;
            font-size: 2.5rem !important;
        }

        .feature-content h5 {
            font-size: 1.3rem !important;
            font-weight: 600 !important;
            margin-bottom: 1rem !important;
            color: #2c3e50 !important;
        }

        .feature-content p {
            font-size: 0.95rem !important;
            line-height: 1.7 !important;
            color: #6c757d !important;
            margin-bottom: 0 !important;
        }

        /* Countries Section */
        .country {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
            padding: 5rem 0 !important;
        }

        .country-item {
            position: relative !important;
            border-radius: 20px !important;
            overflow: hidden !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            margin-bottom: 2rem !important;
        }

        .country-item:hover {
            transform: translateY(-12px) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important;
        }

        .country-item .rounded {
            height: 250px !important;
            position: relative !important;
        }

        .country-item .rounded img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            transition: transform 0.5s ease !important;
        }

        .country-item:hover .rounded img {
            transform: scale(1.1) !important;
        }

        .country-flag {
            position: absolute !important;
            top: 20px !important;
            right: 20px !important;
            width: 70px !important;
            height: 70px !important;
            border: 4px solid white !important;
            border-radius: 50% !important;
            overflow: hidden !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
            z-index: 2 !important;
        }

        .country-flag img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        .country-name {
            position: absolute !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            padding: 2rem 1.5rem !important;
            text-align: center !important;
            transform: translateY(100%) !important;
            transition: transform 0.4s ease !important;
        }

        .country-item:hover .country-name {
            transform: translateY(0) !important;
        }

        .country-name a {
            text-decoration: none !important;
            font-weight: 600 !important;
            font-size: 1.3rem !important;
            color: white !important;
            transition: color 0.3s ease !important;
        }

        .country-name a:hover {
            color: #ffd700 !important;
        }

        /* Featured Visas Section */
        .featured-visas {
            background: white !important;
            padding: 5rem 0 !important;
        }

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

        .visa-card:hover {
            transform: translateY(-12px) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12) !important;
        }

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

        .visa-footer {
            padding: 1.5rem !important;
        }

        .visa-footer .btn {
            font-weight: 600 !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 25px !important;
            transition: all 0.3s ease !important;
        }

        /* Testimonials Section */
        .testimonial {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            padding: 5rem 0 !important;
        }

        .testimonial-item {
            background: rgba(255, 255, 255, 0.15) !important;
            border-radius: 20px !important;
            padding: 2.5rem !important;
            backdrop-filter: blur(15px) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            transition: all 0.3s ease !important;
        }

        .testimonial-item:hover {
            transform: translateY(-5px) !important;
            background: rgba(255, 255, 255, 0.2) !important;
        }

        .testimonial-content {
            background: white !important;
            color: #333 !important;
            border-radius: 15px !important;
            position: relative !important;
            padding: 2rem !important;
        }

        .testimonial-content::after {
            content: '' !important;
            position: absolute !important;
            bottom: -12px !important;
            left: 40px !important;
            width: 0 !important;
            height: 0 !important;
            border-left: 12px solid transparent !important;
            border-right: 12px solid transparent !important;
            border-top: 12px solid white !important;
        }

        .testimonial-content p {
            font-size: 1.1rem !important;
            line-height: 1.7 !important;
            margin-bottom: 1rem !important;
            color: #495057 !important;
        }

        .testimonial-content .d-flex {
            gap: 0.5rem !important;
        }

        .testimonial-content .fas {
            color: #ffc107 !important;
            font-size: 1.2rem !important;
        }

        .testimonial-item .d-flex {
            margin-top: 1.5rem !important;
        }

        .testimonial-item .rounded-circle {
            border: 4px solid rgba(255, 255, 255, 0.3) !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
        }

        .testimonial-item h5 {
            font-size: 1.2rem !important;
            font-weight: 600 !important;
            color: white !important;
            margin-bottom: 0.5rem !important;
        }

        .testimonial-item p {
            color: rgba(255, 255, 255, 0.8) !important;
            margin-bottom: 0 !important;
        }

        /* Section Titles */
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

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none !important;
            border-radius: 30px !important;
            padding: 1rem 2.5rem !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3) !important;
        }

        .btn-primary:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4) !important;
        }

        .btn-outline-primary {
            border: 2px solid #667eea !important;
            color: #667eea !important;
            border-radius: 30px !important;
            padding: 1rem 2.5rem !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            background: transparent !important;
        }

        .btn-outline-primary:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4) !important;
        }

        /* Badge Styling */
        .badge {
            font-weight: 600 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 20px !important;
            font-size: 0.8rem !important;
        }

        .badge.bg-warning {
            background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%) !important;
            color: #212529 !important;
        }

        /* Animation Classes */
        .wow {
            visibility: visible !important;
            opacity: 1 !important;
        }

        .wow.animated {
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* Prevent sections from disappearing */
        .counter-facts,
        .service,
        .features,
        .country,
        .featured-visas,
        .testimonial {
            visibility: visible !important;
            opacity: 1 !important;
            display: block !important;
        }

        /* Icon Fallbacks */
        .fas,
        .fa {
            display: inline-block !important;
            font-style: normal !important;
            font-variant: normal !important;
            text-rendering: auto !important;
            -webkit-font-smoothing: antialiased !important;
            font-family: "Font Awesome 6 Free", "Font Awesome 5 Free", "FontAwesome" !important;
        }

        .fas::before,
        .fa::before {
            display: inline-block !important;
        }

        /* Fallback icons if FontAwesome fails */
        .icon-fallback {
            display: inline-block !important;
            width: 1em !important;
            height: 1em !important;
            background: currentColor !important;
            border-radius: 50% !important;
            margin-right: 0.5em !important;
        }

        /* CSS-only fallback icons */
        .fas.fa-passport::before {
            content: "🛂" !important;
        }

        .fas.fa-users::before {
            content: "👥" !important;
        }

        .fas.fa-user-check::before {
            content: "✅" !important;
        }

        .fas.fa-handshake::before {
            content: "🤝" !important;
        }

        .fas.fa-dollar-sign::before {
            content: "💰" !important;
        }

        .fas.fa-cc-visa::before {
            content: "💳" !important;
        }

        .fas.fa-atlas::before {
            content: "🌍" !important;
        }

        .fas.fa-clock::before {
            content: "⏰" !important;
        }

        .fas.fa-check-circle::before {
            content: "✅" !important;
        }

        .fas.fa-shield-alt::before {
            content: "🛡️" !important;
        }

        .fas.fa-eye::before {
            content: "👁️" !important;
        }

        .fas.fa-arrow-right::before {
            content: "➡️" !important;
        }

        .fas.fa-globe::before {
            content: "🌐" !important;
        }

        .fas.fa-map-marker-alt::before {
            content: "📍" !important;
        }

        .fas.fa-star::before {
            content: "⭐" !important;
        }

        /* Ensure FontAwesome icons are visible even if font fails */
        .fas::before,
        .fa::before {
            display: inline-block !important;
            font-family: inherit !important;
        }

        /* Ensure text visibility */
        .counter h3,
        .counter h4,
        .service-title-name h4,
        .service-title-name p,
        .feature-content h5,
        .feature-content p,
        .visa-country h4,
        .visa-country p,
        .visa-price h3,
        .visa-price p,
        .visa-features .feature-item span,
        .testimonial-content p,
        .testimonial-item h5,
        .testimonial-item p {
            color: inherit !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* Text contrast improvements */
        .counter h3 {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        .service-title-name h4 {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        .visa-country h4 {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .counter-value {
                font-size: 2.5rem !important;
            }

            .counter-icon {
                font-size: 2.5rem !important;
            }

            .service-item {
                height: 380px !important;
            }

            .visa-card {
                margin-bottom: 2rem !important;
            }

            .section-title h1 {
                font-size: 2.5rem !important;
            }

            .btn-primary,
            .btn-outline-primary {
                padding: 0.75rem 2rem !important;
                font-size: 0.9rem !important;
            }

            .country-item .rounded {
                height: 200px !important;
            }

            .testimonial-item {
                padding: 2rem !important;
            }
        }

        @media (max-width: 576px) {
            .counter {
                padding: 2rem 1rem !important;
            }

            .service-item {
                height: 350px !important;
            }

            .section-title h1 {
                font-size: 2rem !important;
            }

            .visa-card {
                margin-bottom: 1.5rem !important;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.7 !important;
            pointer-events: none !important;
        }

        /* Prevent content from being hidden by animations */
        .fadeInUp,
        .fadeInDown,
        .fadeInLeft,
        .fadeInRight,
        .zoomIn,
        .zoomInDown {
            animation-fill-mode: both !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* Override any animation that might hide content */
        @keyframes fadeInUp {
            from {
                opacity: 1 !important;
                transform: translate3d(0, 0, 0) !important;
            }

            to {
                opacity: 1 !important;
                transform: translate3d(0, 0, 0) !important;
            }
        }

        /* Ensure all animated elements stay visible */
        [class*="wow"] {
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* Focus States for Accessibility */
        .btn:focus,
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25) !important;
            outline: none !important;
        }

        /* Print Styles */
        @media print {

            .counter-facts,
            .service,
            .features,
            .country,
            .featured-visas,
            .testimonial {
                break-inside: avoid !important;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Counter Facts Start -->
    <div class="container-fluid counter-facts py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fas fa-passport" style="display: inline-block !important;"></i>
                        </div>
                        <div class="counter-content">
                            <h3>{{ __('translation.visa_categories') }}</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">31</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">
                                    {{ __('translation.plus') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fas fa-users" style="display: inline-block !important;"></i>
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
                            <i class="fas fa-user-check" style="display: inline-block !important;"></i>
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
                            <i class="fas fa-handshake" style="display: inline-block !important;"></i>
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
                @foreach ($services as $item)
                    <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    @if ($item->getFirstMedia('visatype_cover'))
                                        <img src="{{ $item->getFirstMedia('visatype_cover')->getUrl() }}"
                                            class="img-fluid w-100 rounded" alt="{{ $item->name }}">
                                    @else
                                        <div class="bg-primary d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <i class="fas fa-passport text-white" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <h4 class="text-white mb-3">{{ $item->name }}</h4>
                                        <p class="text-light mb-4">{{ __('translation.visa_type_description') }}</p>
                                        <a class="btn btn-light text-primary rounded-pill py-2 px-4"
                                            href="/visas?type={{ $item->id }}">
                                            <i class="fas fa-arrow-right me-2"></i>{{ __('translation.explore_visas') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="/visas" class="btn btn-outline-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s">
                    <i class="fas fa-globe me-2"></i>{{ __('translation.view_all_visa_types') }}
                </a>
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
                                        @if ($item->getFirstMedia('country_cover'))
                                            <img src="{{ $item->getFirstMedia('country_cover')->getUrl() }}"
                                                class="img-fluid w-100 rounded" alt="{{ __('translation.image') }}">
                                        @else
                                            <div class="bg-primary d-flex align-items-center justify-content-center"
                                                style="height: 200px;">
                                                <i class="fas fa-flag text-white" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="country-flag">
                                        @if ($item->getFirstMedia('country'))
                                            <img src="{{ $item->getFirstMedia('country')->getUrl() }}"
                                                class="img-fluid rounded-circle" alt="{{ __('translation.image') }}">
                                        @else
                                            <div class="bg-warning d-flex align-items-center justify-content-center rounded-circle"
                                                style="width: 60px; height: 60px;">
                                                <i class="fas fa-flag text-white"></i>
                                            </div>
                                        @endif
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


            <!-- Featured Visas Start -->
            <div class="container-fluid featured-visas overflow-hidden py-5">
                <div class="container">
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s"
                        style="margin-bottom: 70px;">
                        <div class="sub-style">
                            <h5 class="sub-title text-primary px-3">{{ __('translation.featured_visas') }}</h5>
                        </div>
                        <h1 class="display-5 mb-4">{{ __('translation.popular_visa_services') }}</h1>
                        <p class="mb-0">{{ __('translation.featured_visas_description') }}</p>
                    </div>
                    <div class="row g-4">
                        @foreach ($visas as $visa)
                            <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="visa-card">
                                    <!-- Visa Image -->
                                    <div class="visa-image">
                                        @if ($visa->getFirstMedia('visa_image'))
                                            <img src="{{ $visa->getFirstMedia('visa_image')->getUrl() }}"
                                                alt="{{ $visa->name }}" class="img-fluid w-100">
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
                                            <p class="text-light mb-0">
                                                <i class="fas fa-map-marker-alt me-1"></i>{{ $visa->country->name }}
                                            </p>
                                        </div>
                                        <div class="visa-type-badge">
                                            <span class="badge bg-warning text-dark">{{ $visa->visaType->name }}</span>
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
                                            <div class="feature-item">
                                                <i class="fas fa-shield-alt text-info"></i>
                                                <span>{{ __('translation.secure_process') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="visa-footer">
                                        <a href="/visas/{{ $visa->slug }}" class="btn btn-primary w-100">
                                            <i class="fas fa-eye me-2"></i>{{ __('translation.view_details') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-5">
                        <a href="/visas" class="btn btn-outline-primary rounded-pill py-3 px-5 wow fadeInUp"
                            data-wow-delay="0.1s">
                            {{ __('translation.view_all_visas') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- Featured Visas End -->


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

    <script>
        // Ensure FontAwesome icons are loaded and sections remain visible
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, checking FontAwesome...');

            // Function to check if FontAwesome is loaded
            function checkFontAwesome() {
                const testIcon = document.createElement('i');
                testIcon.className = 'fas fa-check';
                testIcon.style.position = 'absolute';
                testIcon.style.left = '-9999px';
                document.body.appendChild(testIcon);

                const isLoaded = testIcon.offsetWidth > 0 ||
                    getComputedStyle(testIcon, ':before').content !== 'none';

                document.body.removeChild(testIcon);
                return isLoaded;
            }

            // Wait for FontAwesome to load
            let attempts = 0;
            const maxAttempts = 10;

            function waitForFontAwesome() {
                if (checkFontAwesome() || attempts >= maxAttempts) {
                    if (!checkFontAwesome()) {
                        console.log('FontAwesome not loaded after attempts, using fallback icons');
                        addFallbackIcons();
                    } else {
                        console.log('FontAwesome loaded successfully');
                    }
                    ensureSectionsVisible();
                    animateCounters();
                } else {
                    attempts++;
                    setTimeout(waitForFontAwesome, 500);
                }
            }

            // Add fallback icons
            function addFallbackIcons() {
                const iconMap = {
                    'fa-passport': '🛂',
                    'fa-users': '👥',
                    'fa-user-check': '✅',
                    'fa-handshake': '🤝',
                    'fa-dollar-sign': '💰',
                    'fa-cc-visa': '💳',
                    'fa-atlas': '🌍',
                    'fa-clock': '⏰',
                    'fa-check-circle': '✅',
                    'fa-shield-alt': '🛡️',
                    'fa-eye': '👁️',
                    'fa-arrow-right': '➡️',
                    'fa-globe': '🌐',
                    'fa-map-marker-alt': '📍',
                    'fa-star': '⭐'
                };

                const icons = document.querySelectorAll('.fas, .fa');
                icons.forEach(function(icon) {
                    const classes = Array.from(icon.classList);
                    let fallbackText = '●';

                    // Find matching fallback
                    for (const [faClass, emoji] of Object.entries(iconMap)) {
                        if (classes.includes(faClass.replace('fa-', ''))) {
                            fallbackText = emoji;
                            break;
                        }
                    }

                    // Add fallback if icon is not visible
                    if (!icon.offsetWidth && !icon.offsetHeight) {
                        const fallback = document.createElement('span');
                        fallback.textContent = fallbackText;
                        fallback.className = 'icon-fallback';
                        fallback.style.cssText = 'font-size: 1.2em; color: inherit; margin-right: 0.5em;';
                        icon.parentNode.insertBefore(fallback, icon);
                        icon.style.display = 'none';
                    }
                });
            }

            // Ensure sections remain visible
            function ensureSectionsVisible() {
                const sections = [
                    '.counter-facts',
                    '.service',
                    '.features',
                    '.country',
                    '.featured-visas',
                    '.testimonial'
                ];

                sections.forEach(function(selector) {
                    const elements = document.querySelectorAll(selector);
                    elements.forEach(function(element) {
                        element.style.visibility = 'visible';
                        element.style.opacity = '1';
                        element.style.display = 'block';
                    });
                });

                // Ensure all text elements are visible
                const textElements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, span, div');
                textElements.forEach(function(element) {
                    if (element.textContent.trim() !== '' &&
                        !element.classList.contains('fas') &&
                        !element.classList.contains('fa')) {
                        element.style.visibility = 'visible';
                        element.style.opacity = '1';
                    }
                });
            }

            // Animate counters
            function animateCounters() {
                const counters = document.querySelectorAll('.counter-value');
                counters.forEach(function(counter) {
                    const target = parseInt(counter.getAttribute('data-toggle'));
                    if (target && !counter.classList.contains('animated')) {
                        counter.classList.add('animated');
                        let current = 0;
                        const increment = target / 50;
                        const timer = setInterval(function() {
                            current += increment;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            counter.textContent = Math.floor(current);
                        }, 50);
                    }
                });
            }

            // Start the process
            waitForFontAwesome();

            // Additional safety check every 2 seconds
            setInterval(function() {
                ensureSectionsVisible();
            }, 2000);
        });
    </script>
@endsection
