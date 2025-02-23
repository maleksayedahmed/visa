 @extends('template.user.layouts.app')

@section('content')
    {{-- <h2 class="category-title">{{$visa->name}}</h2>
    <div class="cards-container">
        @foreach ($visas as $visa)
            @if ($city->status == 1)
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{ $city->name }}</h5>
                </div>
            </div>
            @endif
        @endforeach
    </div> --}}

    <div class="container-fluid features overflow-hidden py-5">
            <div class="container py-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

                    <h1 class="display-5 mb-4">{{$visa->name}}</h1>
                    <p class="mb-0">{{$visa->description}}</p>
                </div>
                <div class="row g-4 justify-content-center text-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="feature-item text-center p-4">
                            <div class="feature-icon p-3 mb-4">
                                <i class="fas fa-dollar-sign fa-4x text-primary"></i>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-3">{{$visa->cost}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="feature-item text-center p-4">
                            <div class="feature-icon p-3 mb-4">
                                <i class="fab fa-cc-visa fa-4x text-primary"></i>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-3">{{$visa->visa_type}}</h5>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="https://wa.me/+970567067187" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Buy now!</a>
                    </div>
                </div>
            </div>
        </div>

@endsection


