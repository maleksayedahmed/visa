<!-- Topbar Start -->
<div class="container-fluid bg-primary px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-5 text-center text-lg-start mb-lg-0">
            <div class="d-flex">
                <a href="#" class="text-muted me-4"><i class="fas fa-envelope text-secondary me-2"></i>{{getSetting()->email}}</a>
                <a href="#" class="text-muted me-0"><i class="fas fa-phone-alt text-secondary me-2"></i>{{getSetting()->mobile_number}}</a>
            </div>
        </div>
        <div class="col-lg-3 row-cols-1 text-center mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" target="_blank" href="{{getSetting()->x}}"><i class="fab fa-twitter fw-normal text-secondary"></i></a>
                <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" target="_blank" href="{{getSetting()->facebook}}"><i class="fab fa-facebook-f fw-normal text-secondary"></i></a>
                <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" target="_blank" href="{{getSetting()->instagram}}"><i class="fab fa-instagram fw-normal text-secondary"></i></a>
                <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" target="_blank" href="https://wa.me/{{getSetting()->whatsapp}}"><i class="fab fa-whatsapp fw-normal text-secondary"></i></a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="#" class="text-muted me-2">Help</a><small> / </small>
                <a href="#" class="text-muted mx-2">Support</a><small> / </small>
                <a href="#" class="text-muted ms-2">Contact</a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
