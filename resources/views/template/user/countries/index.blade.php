@extends('template.user.layouts.app')

@section('content')
    <h2 class="category-title">Countries</h2>
    <div class="cards-container">
        @foreach ($countries as $country)
            @if ($country->status == 1)
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{ $country->name }}</h5>
                <a href="{{ route('country.show', $country->id) }}" class="btn btn-primary">See details</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>

@endsection
