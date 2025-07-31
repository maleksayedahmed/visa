@extends('template.user.layouts.app')

@section('content')
    <h2 class="category-title">{{ __('translation.visas') }}</h2>
    <div class="cards-container">
        @foreach ($visas as $visa)
            {{-- <div class="card">
                <img src="{{ asset('assets/images/breadcrumb.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $visa->name }}</h4>
                    <h5 class="card-title">{{ $visa->visa_type }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($visa->description), 100) }}</p>
                    <a href="{{ route('visas.show', $visa->id) }}" class="btn btn-primary">{{ __('attributes.details') }}</a>
                </div>
            </div> --}}
            <div class="card visa-card">
                <img src="{{ asset('assets/images/breadcrumb.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title" style="font-size: 28px; font-weight: 600">{{ $visa->name }}</h4>
                    <h5 class="card-title">{{ $visa->visa_type }}</h5>
                </div>

                <div class="card-overlay">
                    <div class="overlay-content">
                        <h5>{{ $visa->name }}</h5>
                        <h6>{{ $visa->visa_type }}</h6>

                        <div class="visa-description collapsed" id="visa-desc-{{ $visa->id }}">
                            {{ strip_tags($visa->description) }}
                        </div>

                        <button class="toggle-desc-btn btn btn-sm btn-light mt-2"
                            onclick="toggleDescription({{ $visa->id }})"
                            data-show-more="{{ __('translation.show_more') }}"
                            data-show-less="{{ __('translation.show_less') }}">
                            {{ __('translation.show_more') }}
                        </button>

                        <a href="{{ route('visas.show', $visa->id) }}" class="btn btn-primary mt-4">
                            {{ __('attributes.details') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <nav aria-label="Page navigation example">
        {{ $visas->links() }}
    </nav>
@endsection
