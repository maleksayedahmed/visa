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
                                  {{$item->id}}
                            @if ($item->id)
                                <form action="{{ route('admin.visatypes.update', $item->id) }}" method="post">
                            @else
                                <form action="{{ route('admin.visatypes.store') }}" method="post">
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


                            <div class="mb-3 col-md-6">
                                <div class="checkbox checkbox-success">
                                    <input type="hidden" name="status" value="0">
                                    <input id="checkbox6a" type="checkbox" name="status" value="1"
                                           @if (isset($item->status) && $item->status == 1) checked @endif
                                           data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    <label class="form-label" for="checkbox6a">
                                        @lang('attributes.status')
                                    </label>
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
