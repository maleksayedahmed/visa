@extends('template.admin.layouts.master')
@section('title', __('Comment'))

@section('content')
    <div class="content-page">
        <div class="content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.comment') }}</h4>
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
                                <form action="{{ route('admin.comments.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                @else
                                    <form action="{{ route('admin.comments.store') }}" method="post"
                                        enctype="multipart/form-data">
                            @endif

                            @csrf


                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="user">@lang('attributes.user')</label>
                                    <select class="form-control" name="user" id="user">
                                        <option value="">{{ __('Select User') }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ isset($item->user_id) && $item->user_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="blog">@lang('attributes.blog')</label>
                                    <select class="form-control" name="blog" id="blog">
                                        <option value="">{{ __('Select Blog') }}</option>
                                        @foreach ($blogs as $blog)
                                            <option value="{{ $blog->id }}" {{ isset($item->blog_id) && $item->blog_id == $blog->id ? 'selected' : '' }}>
                                                {{ $blog->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('blog')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>


                            <div class="row">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="comment">@lang('attributes.comment')</label>
                                        <textarea cols="30" rows="10" class="form-control" name="comment" id="comment"
                                            placeholder="@lang('attributes.comment')">{{ old('comment', $item->content ?? '') }}</textarea>

                                        @error('comment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>



                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        {{-- @if ($item->id)
                                            <img id="image-preview" src="{{ $item->getFirstMediaUrl('comment') }}"
                                                alt="Current Image"
                                                style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                        @else
                                            <img id="image-preview" src="" alt="Image Preview"
                                                style="display: none; max-width: 100%; height: auto; margin-bottom: 10px;">
                                        @endif --}}
                                        <!-- <label for="customFile">Custom File</label> -->
                                        {{-- <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="photo"
                                                accept="image/*">
                                            <label class="custom-file-label" for="customFile">@lang('attributes.choose_comment_image')</label>
                                        </div>
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror --}}
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
