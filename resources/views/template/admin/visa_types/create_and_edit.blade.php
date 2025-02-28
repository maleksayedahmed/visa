@extends('template.admin.layouts.master')
@section('title', __('attributes.visatypes'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.visatypes') }}</h4>
                    </div>
                </div>
            </div>
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
                                <form action="{{ route('admin.visatypes.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @else
                                <form action="{{ route('admin.visatypes.store') }}" method="post" enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name">@lang('attributes.name')</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="@lang('attributes.name')"
                                           value="{{ old('name', $item->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    @if ($item->id)
                                        <img id="image-preview" src="{{ $item->getFirstMedia('visatype_cover') ? '/media/' . $item->getFirstMedia('visatype_cover')->id . '/' . $item->getFirstMedia('visatype_cover')->file_name : '' }}
"
                                            alt="Current Image"
                                            style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                    @else
                                        <img id="image-preview" src="" alt="Image Preview"
                                            style="display: none; max-width: 100%; height: auto; margin-bottom: 10px;">
                                    @endif
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="visatype_cover"
                                            accept="image/*">
                                        <label class="custom-file-label" for="customFile">@lang('attributes.choose_image_cover')</label>
                                    </div>
                                    @error('visatype_cover')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="text-end mb-0">
                                <button class="btn btn-success me-1" type="submit">
                                    {{ $item->id ? __('attributes.edit') : __('attributes.submit') }}
                                </button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
