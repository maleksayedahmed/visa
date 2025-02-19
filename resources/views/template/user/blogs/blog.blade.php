@extends('template.user.layouts.app')

@section('content')
    <div class="blog-header" style="background-image: url('{{ asset('assets/images/blog-img.png') }}');">
        <div class="overlay">
            <h1 class="blog-header-title">{{ $blog->title }}</h1>
        </div>
    </div>
    <div class="blog-details-container">
        <p class="blog-publish-date">Published on: {{ $blog->created_at->format('F j, Y') }}</p>
        <h1 class="blog-title">{{ $blog->title }}</h1>
        <div class="blog-text">
            <!-- Display the content, making sure it's properly escaped -->
            {!! ($blog->description) !!}

            <!-- Display the blog's image if available -->
            @if($blog->image)
                <div class="blog-inline-image">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Content Image">
                    <p class="caption">{{ $blog->image_caption }}</p>
                </div>
            @endif

            <!-- Loop through subheadings if available -->
            @foreach($blog->subheadings as $subheading)
                <h2 class="blog-subtitle">{{ $subheading->title }}</h2>
                <p>{{ $subheading->content }}</p>
            @endforeach
        </div>
    </div>
@endsection
