<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-secondary mb-4">{{ __('translation.contact_info') }}</h4>
                    <a href=""><i class="fas fa-envelope me-2"></i> {{ getSetting()->email }}</a>
                    <a href="tel:+{{ getSetting()->mobile_number }}"><i class="fas fa-phone me-2"></i>
                        +{{ getSetting()->mobile_number }}</a>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-share fa-2x text-secondary me-2"></i>
                        <a class="btn mx-1" target="_blank" href="{{ getSetting()->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn mx-1" target="_blank" href="{{ getSetting()->x }}"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn mx-1" target="_blank" href="{{ getSetting()->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn mx-1" target="_blank" href="https://wa.me/{{ getSetting()->whatsapp }}"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-secondary mb-4">{{ __('translation.opening_time') }}</h4>
                    <div class="mb-3">
                        <h6 class="text-muted mb-0">{{ __('translation.mon_friday') }}</h6>
                        <p class="text-white mb-0">09.00 am to 07.00 pm</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted mb-0">{{ __('translation.saturday') }}</h6>
                        <p class="text-white mb-0">10.00 am to 05.00 pm</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted mb-0">{{ __('translation.vacation') }}</h6>
                        <p class="text-white mb-0">{{ __('translation.all_sunday_vacation') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-secondary mb-4">{{ __('translation.our_services') }}</h4>
                    @foreach ($visaTypes as $visaType)
                        <a href="{{ route('visas.index') }}">
                            <i class="fas fa-angle-right me-2"></i> {{ $visaType->name }}
                        </a>
                    @endforeach
                </div>

            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-secondary mb-4">{{ __('translation.newsletter') }}</h4>
                    <p class="text-white mb-3">{{ __('translation.stay_updated') }}</p>
                    <div class="position-relative mx-auto rounded-pill">
                        <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="{{ __('translation.enter_your_email') }}"
                            placeholder="Enter your email">
                        <button type="button"
                            class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">{{ __('translation.signup') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-white">
                    <a href="{{ url('/') }}" class="border-bottom text-white">
                        <i class="fas fa-copyright text-light me-2"></i>{{ getSetting()->title }}
                    </a>, {{ __('translation.all_rights_reserved') }}
                </span>
            </div>
            <div class="col-md-6 text-center text-md-end text-white">
                {{ __('translation.designed_by') }}
                <a class="border-bottom text-white" target="_blank"
                    href="https://www.linkedin.com/in/malek-sayed-ahmed">Malek Sayed Ahmed</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js') }}"></script>
