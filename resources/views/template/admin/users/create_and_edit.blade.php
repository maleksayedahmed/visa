@extends('template.admin.layouts.master')
@section('title', __('attributes.user'))


@section('content')
    <div class="content-page">
        <div class="content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.pets') }}</h4>
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

                            <form
                                action="{{ $user->id ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
                                method="POST">
                                @csrf
                                @if ($user->id)
                                    @method('PUT')
                                @endif
                                <div class="row">

                                    <div class="mb-3">
                                        <label for="name">@lang('attributes.name')</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name', $user->name) }}"
                                            placeholder="@lang('attributes.enter_name')">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>





                                    <div class="mb-3">
                                        <label for="email">@lang('attributes.email')</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{ old('email', $user->email) }}"
                                            placeholder="@lang('attributes.enter_email')">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone">@lang('attributes.phone')</label>
                                        <input type="phone" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                                            placeholder="@lang('attributes.enter_phone')">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password">@lang('attributes.password')</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password" value="{{ old('password') }}"
                                            placeholder="@lang('attributes.enter_password')">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation">@lang('attributes.password_confirmation')</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password_confirmation"
                                            value="{{ old('password_confirmation') }}" placeholder="@lang('attributes.enter_password_confirmation')">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="gender">@lang('attributes.gender')</label>
                                        <select name="gender" id="gender"
                                            class="form-select @error('gender') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('gender', $user->gender) == 1 ? 'selected' : '' }}>
                                                @lang('attributes.male')</option>
                                            <option value="0"
                                                {{ old('gender', $user->gender) == 0 ? 'selected' : '' }}>
                                                @lang('attributes.female')</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="birth_date">@lang('attributes.birth_date')</label>
                                        <input type="date"
                                            class="form-control @error('birth_date') is-invalid @enderror"
                                            name="birth_date" id="birth_date"
                                            value="{{ old('birth_date', $user->birth_date != null ? $user->birth_date->format('Y-m-d') : '') }}">
                                        @error('birth_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <div class="checkbox checkbox-success">
                                            <input type="hidden" name="status" value="0">
                                            <input id="checkbox6a" type="checkbox" name="status" value="1"
                                                @if (isset($pet->status) && $pet->status == 1) checked @endif
                                                data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                            <label class="form-label" for="checkbox6a">
                                                @lang('attributes.status')
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                @if ($user->id)
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


@section('js')
<script>

    $(document).ready(function () {


        // Event: Fetch cities based on selected country
        $(document).on('change', '.country-dropdown', function () {
            const index = $(this).data('index');
            const countryId = $(this).val();
            const cityDropdown = $(`#addresses\\[${index}\\]\\[city_id\\]`);
            const areaDropdown = $(`#addresses\\[${index}\\]\\[area_id\\]`);

            cityDropdown.empty().append('<option value="">@lang('attributes.loading')</option>');
            areaDropdown.empty().append('<option value="">@lang('attributes.select_city_first')</option>');

            if (countryId) {
                updateCities(countryId, index, cityDropdown);
            }
        });


    });



    // Update cities for a given country
    function updateCities(countryId, index, cityDropdown, callback = null) {
        const areaDropdown = $(`#addresses\\[${index}\\]\\[area_id\\]`);
        $.ajax({
            url: '{{ route('api.cities.index') }}', // Replace with your cities route
            method: 'GET',
            data: { country_id: countryId },
            success: function (response) {
                cityDropdown.empty().append('<option value="">@lang('attributes.select_city')</option>');
                response.data.forEach(function (city) {
                    cityDropdown.append(`<option value="${city.id}">${city.name}</option>`);
                });
                areaDropdown.empty().append('<option value="">@lang('attributes.select_city_first')</option>');
                if (callback) callback(); // Call the callback, if provided
            },
            error: function () {
                alert('@lang('attributes.error_loading_cities')');
            }
        });
    }


</script>


@endsection
