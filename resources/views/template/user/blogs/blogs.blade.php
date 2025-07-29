@extends('template.user.layouts.app')

@section('content')
    <h2 class="category-title">{{ __('translation.blogs') }}</h2>
    <div class="cards-container">
        @foreach ($blogs as $blog)
            <div class="card">
                <img src="{{ asset('assets/images/blog-img.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="publish-date">Published on: {{ $blog->created_at->format('F j, Y') }}</p>
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($blog->description), 100) }}</p>
                    <a href="{{ route('blog.index', $blog->id) }}" class="btn btn-primary">See details</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <nav aria-label="Page navigation example">
        {{ $blogs->links() }}
    </nav>
@endsection
