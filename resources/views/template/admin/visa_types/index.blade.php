@extends('template.admin.layouts.master')

@section('title', __('attributes.visatypes'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- Start Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">@lang('attributes.visatypes')</h4>
                            <a class="btn btn-success" href="{{ route('admin.visatypes.create') }}">
                                @lang('attributes.create')
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('attributes.name')</th>
                                            <th>@lang('attributes.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visaTypes as $visaType)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $visaType->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.visatypes.edit', $visaType->id) }}" class="btn btn-warning">
                                                        <i class="fa uil-edit"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#delete{{ $visaType->id }}">
                                                        <i class="fa uil-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete{{ $visaType->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">@lang('attributes.delete') :
                                                                <span class="text-danger">{{ $visaType->name }}</span>
                                                            </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="deleteForm{{ $visaType->id }}" action="{{ route('admin.visatypes.delete', $visaType->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-body">
                                                                <p class="text-center text-danger fs-2 m-0 fw-bold">
                                                                    @lang('attributes.delete_confirmation')
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                                    @lang('attributes.close')
                                                                </button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    @lang('attributes.delete')
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- End Card Body -->
                        </div> <!-- End Card -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div> <!-- Container -->
        </div> <!-- Content -->
    </div> <!-- Content Page -->
@endsection
