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

                            @if ($item->id)
                                <form action="{{ route('admin.areas.update', $item->id) }}" method="post">
                                @else
                                    <form action="{{ route('admin.areas.store') }}" method="post">
                            @endif

                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label>@lang('attributes.country')</label>
                                        <select class="form-select" id="country-select" required
                                            class="form-control select2" style="width: 100%;" name="country_id">
                                            <option value="" disabled selected>@lang('attributes.select_country')</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label>@lang('attributes.city')</label>
                                        <select class="form-select" id="city-select" required class="form-control select2"
                                            style="width: 100%;" name="city_id">
                                            <option value="" disabled selected>@lang('attributes.select_city')</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('city_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name[en]">@lang('attributes.name_en')</label>
                                        <input required type="text" class="form-control" name="name[en]" id="name[en]"
                                            placeholder="@lang('attributes.name_en')"
                                            value="{{ old('name[en]', $item->getTranslation('name', 'en')) }}">
                                        @error('name[en]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="name[ar]">@lang('attributes.name_ar')</label>
                                        <input required type="text" class="form-control" name="name[ar]" id="name[ar]"
                                            placeholder="@lang('attributes.name_ar')"
                                            value="{{ old('name[ar]', $item->getTranslation('name', 'ar')) }}">
                                        @error('name[ar]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="checkbox checkbox-success">
                                        <input type="hidden" name="status" value="0">
                                        <input id="checkbox6a" type="checkbox" name="status" value="1"
                                            @if (isset($item->status) && $item->status == 1) checked @endif data-bootstrap-switch
                                            data-off-color="danger" data-on-color="success">
                                        <label class="form-label" for="checkbox6a">
                                            @lang('attributes.status')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            @if ($item->id)
                                <div class="text-end mb-0">
                                    <button class="btn btn-success me-1" type="submit">Edit</button>
                                </div>
                            @else
                                <div class="text-end mb-0">
                                    <button class="btn btn-success me-1" type="submit">Submit</button>
                                </div>
                            @endif

                            </form>
                        </div>
                    </div> <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
@endsection
