@extends('template.admin.layouts.master')
@section('title', __('attributes.slider'))

@section('content')
    <div class="content-page">
        <div class="content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.slider') }}</h4>
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

                            @if ($slider->id)
                                <form action="{{ route('admin.sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                @else
                                    <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="row">
                                @foreach (config('app.locales') as $locale)
                                    <div class="mb-3 col-md-6">
                                        <label for="title_{{ $locale }}">@lang('attributes.title')
                                            ({{ $locale }})
                                        </label>
                                        <input type="text"
                                            class="form-control @error("title.$locale") is-invalid @enderror"
                                            name="title[{{ $locale }}]" id="title_{{ $locale }}"
                                            placeholder="@lang('attributes.enter_title') ({{ $locale }})"
                                            value="{{ old("title.$locale", $slider->getTranslation('title', $locale)) }}">
                                        @error("title.$locale")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach


                                @foreach (config('app.locales') as $locale)
                                    <div class="mb-3 col-md-6">
                                        <label for="title_{{ $locale }}">@lang('attributes.description')
                                            ({{ $locale }})
                                        </label>
                                        <textarea type="text"
                                            class="form-control @error("description.$locale") is-invalid @enderror"
                                            name="description[{{ $locale }}]" id="description_{{ $locale }}"
                                            placeholder="@lang('attributes.enter_description') ({{ $locale }})">{{ old("description.$locale", $slider->getTranslation('description', $locale)) }}</textarea>
                                        @error("description.$locale")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach



                                <div class="mb-3 col-md-6">
                                    <label for="image">{{ __('attributes.image') }}</label>
                                    <input type="file" class="form-control" id="example-fileinput" name="image" accept="image/png, image/jpeg">

                                </div>


                                <div class="mb-3 col-md-6">
                                    <div class="checkbox checkbox-success">
                                        <input type="hidden" name="status" value="0">
                                        <input id="checkbox6a" type="checkbox" name="status" value="1"
                                            @if (isset($slider->status) && $slider->status == 1) checked @endif
                                            data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        <label class="form-label" for="checkbox6a">
                                            @lang('attributes.status')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            @if ($slider->id)
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
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();


    });




</script>
@endsection
