@extends('template.admin.layouts.master')
@section('title', __('attributes.blogs'))
@section('css')
<link href="{{asset('assets/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.blogs') }}</h4>
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
                                action="{{ $blog->id ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}"
                                method="POST">

                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="title">@lang('attributes.title')</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" id="title" placeholder="@lang('attributes.enter_title')"
                                            value="{{ old('title', $blog->title) }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="header-title mt-0 mb-1">Body</h4>
                                                    <div id="snow-editor" style="height: 300px;">

                                                    </div> <!-- end Snow-editor-->
                                                </div>
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                                    </div>

                                    <div class="mb-3">
                                        <label for="category_id">@lang('attributes.category')</label>
                                        <select name="category_id" id="category_id"
                                            class="form-select @error('category_id') is-invalid @enderror">
                                            <option value="" selected>@lang('attributes.select_category')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="checkbox checkbox-success">
                                            <input type="hidden" name="status" value="0">
                                            <input id="checkbox6a" type="checkbox" name="status" value="1"
                                                @if (isset($blog->status) && $blog->status == 1) checked @endif
                                                data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                            <label class="form-label" for="checkbox6a">
                                                @lang('attributes.status')
                                            </label>
                                        </div>
                                    </div>


                                </div>

                                @if ($blog->id)
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
{{-- <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script> --}}
{{-- <script src="assets/libs/quill/quill.min.js"></script> --}}

<script src="{{asset('assets/libs/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>
@endsection
