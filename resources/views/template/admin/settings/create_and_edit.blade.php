@extends('template.admin.layouts.master')
@section('title', __('attributes.area'))

@section('content')
    <div class="content-page">
        <div class="content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.area') }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if ($setting)
                            <form action="{{ route('admin.settings.update', $setting->id) }}" method="post">
                            @method('PUT')
                        @else
                            <form action="{{ route('admin.settings.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <!-- Title -->
    <div class="mb-3 col-md-6">
        <label>Title</label>
        <input type="text" name="title" class="form-control"
            value="{{ old('title', $setting->title ?? '') }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3 col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
            value="{{ old('email', $setting->email ?? '') }}" required>
    </div>

    <!-- Mobile Number -->
    <div class="mb-3 col-md-6">
        <label>Mobile Number</label>
        <input type="text" name="mobile_number" class="form-control"
            value="{{ old('mobile_number', $setting->mobile_number ?? '') }}">
    </div>

    <!-- Contact Us - English -->
    <div class="mb-3 col-md-6">
        <label>Contact Us (English)</label>
        <input type="text" name="contact_us[en]" class="form-control"
            value="{{ old('contact_us.en', $setting?->getTranslation('contact_us', 'en') ?? '') }}">
    </div>

    <!-- Contact Us - Arabic -->
    <div class="mb-3 col-md-6">
        <label>Contact Us (Arabic)</label>
        <input type="text" name="contact_us[ar]" class="form-control"
            value="{{ old('contact_us.ar', $setting?->getTranslation('contact_us', 'ar') ?? '') }}">
    </div>

    <!-- Terms and Conditions - English -->
    <div class="mb-3 col-md-6">
        <label>Terms and Conditions (English)</label>
        <input type="text" name="terms_and_condition[en]" class="form-control"
            value="{{ old('terms_and_condition.en', $setting?->getTranslation('terms_and_condition', 'en') ?? '') }}">
    </div>

    <!-- Terms and Conditions - Arabic -->
    <div class="mb-3 col-md-6">
        <label>Terms and Conditions (Arabic)</label>
        <input type="text" name="terms_and_condition[ar]" class="form-control"
            value="{{ old('terms_and_condition.ar', $setting?->getTranslation('terms_and_condition', 'ar') ?? '') }}">
    </div>

    <!-- About Us - English -->
    <div class="mb-3 col-md-12">
        <label>About Us (English)</label>
        <textarea name="about_us[en]" class="form-control" rows="3">{{ old('about_us.en', $setting?->getTranslation('about_us', 'en') ?? '') }}</textarea>
    </div>

    <!-- About Us - Arabic -->
    <div class="mb-3 col-md-12">
        <label>About Us (Arabic)</label>
        <textarea name="about_us[ar]" class="form-control" rows="3">{{ old('about_us.ar', $setting?->getTranslation('about_us', 'ar') ?? '') }}</textarea>
    </div>

    <!-- Social Media Links -->
    <div class="mb-3 col-md-6">
        <label>Facebook</label>
        <input type="text" name="facebook" class="form-control"
            value="{{ old('facebook', $setting->facebook ?? '') }}">
    </div>

    <div class="mb-3 col-md-6">
        <label>X (Twitter)</label>
        <input type="text" name="x" class="form-control"
            value="{{ old('x', $setting->x ?? '') }}">
    </div>

    <div class="mb-3 col-md-6">
        <label>Instagram</label>
        <input type="text" name="instagram" class="form-control"
            value="{{ old('instagram', $setting->instagram ?? '') }}">
    </div>

    <div class="mb-3 col-md-6">
        <label>WhatsApp</label>
        <input type="text" name="whatsapp" class="form-control"
            value="{{ old('whatsapp', $setting->whatsapp ?? '') }}">
    </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                        </form>
                    </div>
                        </div>
                    </div> <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
@endsection
