@extends('template.user.layouts.app')

@section('content')
    <h2 class="category-title">{{$mycountry->name}}</h2>
    <div class="cards-container">
        @foreach ($cities as $city)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $city->name }}</h5>


                </div>
            </div>
        @endforeach
    </div>

@endsection
