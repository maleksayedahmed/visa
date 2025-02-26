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

        </div>
    </div>
    <form action="{{ route('comments.store', $blog->id) }}" method="POST">
        @csrf
        <input type="hidden" name="blog_id" value="{{ $blog->id }}">

        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Your Comment</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>


    <h2>Comments</h2>

    @foreach($blog->comments->where('status', true) as $comment)
    <div class="approved-comment">
        <p><strong>{{ $comment->name }}</strong> ({{ $comment->email }}) said:</p>
        <p>{{ $comment->content }}</p>
    </div>
    @endforeach

    @if($blog->comments->where('status', false)->count() > 0)
        <div class="pending-comments">
            <p>There are some comments awaiting moderation.</p>
        </div>
    @endif


@endsection
