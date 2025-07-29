@extends('template.user.layouts.app')

@section('content')
    <h2 class="category-title">{{ __('translation.visas') }}</h2>
    <div class="cards-container">
        @foreach ($visas as $visa)
            <div class="card">
                <img src="{{ asset('assets/images/breadcrumb.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    {{-- <p class="publish-date">Published on: {{ $visa->created_at->format('F j, Y') }}</p> --}}
                    <h4 class="card-title">{{ $visa->name }}</h4>
                    <h5 class="card-title">{{ $visa->visa_type }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($visa->description), 100) }}</p>
                    <a href="{{ route('visas.show', $visa->id) }}" class="btn btn-primary">{{ __('attributes.details') }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <nav aria-label="Page navigation example">
        {{ $visas->links() }}
    </nav>
@endsection
