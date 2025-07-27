@extends('template.admin.layouts.master')
@section('title', __('Visa'))

@section('content')
    <div class="content-page">
        <div class="content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.visa') }}</h4>
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
                                <form action="{{ route('admin.visas.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                @else
                                    <form action="{{ route('admin.visas.store') }}" method="post"
                                        enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name[en]">@lang('attributes.name_en')</label>
                                        <input type="text" class="form-control" name="name[en]" id="name[en]"
                                            placeholder="@lang('attributes.name_en')"
                                            value="{{ old('name[en]', $item->getTranslation('name', 'en')) }}">
                                        @error('name[en]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name[ar]">@lang('attributes.name_ar')</label>
                                        <input type="text" class="form-control" name="name[ar]" id="name[ar]"
                                            placeholder="@lang('attributes.name_ar')"
                                            value="{{ old('name[ar]', $item->getTranslation('name', 'ar')) }}">
                                        @error('name[ar]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="description[en]">@lang('attributes.description_en')</label>
                                        <input type="text" class="form-control" name="description[en]"
                                            id="description[en]" placeholder="@lang('attributes.description_en')"
                                            value="{{ old('description[en]', $item->getTranslation('description', 'en')) }}">
                                        @error('description[en]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="description[ar]">@lang('attributes.description_ar')</label>
                                        <input type="text" class="form-control" name="description[ar]"
                                            id="description[ar]" placeholder="@lang('attributes.description_ar')"
                                            value="{{ old('description[ar]', $item->getTranslation('description', 'ar')) }}">
                                        @error('description[ar]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="country">@lang('attributes.country')</label>
                                        <select class="form-control" name="country_id" id="country">
                                            <option value="" disabled selected>@lang('attributes.select_country')</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}"
                                                        {{ old('country_id', $item->country_id) == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="visa_type[en]">@lang('attributes.visa_type_en')</label>
                                        <input type="text" class="form-control" name="visa_type[en]" id="visa_type[en]"
                                            placeholder="@lang('attributes.visa_type_en')"
                                            value="{{ old('visa_type.en', $item->getTranslation('visa_type', 'en')) }}">
                                        @error('visa_type.en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="visa_type[ar]">@lang('attributes.visa_type_ar')</label>
                                        <input type="text" class="form-control" name="visa_type[ar]" id="visa_type[ar]"
                                            placeholder="@lang('attributes.visa_type_ar')"
                                            value="{{ old('visa_type.ar', $item->getTranslation('visa_type', 'ar')) }}">
                                        @error('visa_type.ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label for="cost">@lang('attributes.cost')</label>
                                        <input type="text" class="form-control" name="cost"
                                            id="cost" placeholder="@lang('attributes.cost')"
                                            value="{{ old('cost', $item->cost) }}">
                                        @error('cost')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="slug">@lang('attributes.slug')</label>
                                        <input type="text" class="form-control" name="slug"
                                            id="slug" placeholder="@lang('attributes.slug')"
                                            value="{{ old('slug', $item->slug) }}">
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        @if ($item->id)
                                            <img id="image-preview" src="{{ $item->getFirstMediaUrl('visa') }}"
                                                alt="Current Image"
                                                style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                        @else
                                            <img id="image-preview" src="" alt="Image Preview"
                                                style="display: none; max-width: 100%; height: auto; margin-bottom: 10px;">
                                        @endif
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="photo"
                                                accept="image/*">
                                            <label class="custom-file-label" for="customFile">@lang('attributes.choose_visa_image')</label>
                                        </div>
                                        @error('photo')
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
