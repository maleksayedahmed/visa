@extends('template.admin.layouts.master')
@section('title', __('attributes.sliders'))

@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <a class="btn btn-success"
                                href="{{ route('admin.sliders.create') }}">{{ __('attributes.create') }}</a>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

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
                                            <th>@lang('attributes.title')</th>
                                            <th>@lang('attributes.product')</th>
                                            <th>@lang('attributes.status')</th>
                                            <th>@lang('attributes.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr id="row-{{ $slider->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->product->title }}</td>
                                                <td><input id="checkbox-1" type="checkbox" name="status"
                                                        @if ($slider->status == 1) checked @endif
                                                        data-id="{{ $slider->id }}" data-bootstrap-switch
                                                        data-off-color="danger" data-on-color="success"></td>
                                                <td>

                                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}">
                                                        <button type="button" class="btn btn-warning btn-block "><i
                                                                class="fa uil-edit"></i> </button>
                                                    </a>

                                                    <button type="button" class="btn btn-danger btn-block btn-delete"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $slider->id }}">
                                                        <i class="fa uil-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>


                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myCenterModalLabel">
                                                                @lang('attributes.delete') : <span
                                                                    class="text-danger">{{ $slider->name }}</span>
                                                            </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form id="deleteForm{{ $slider->id }}"
                                                            action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-body">
                                                                <p class="text-center text-danger fs-2 m-0 fw-bold">
                                                                    @lang('attributes.delete')
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success"
                                                                    data-bs-dismiss="modal">
                                                                    @lang('attributes.close')
                                                                </button>
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="deleteData({{ $slider->id }})">
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

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>

@endsection
@section('js')

    <script>
        function deleteData(id) {
            const form = document.getElementById(`deleteForm${id}`);
            const url = form.action;

            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert('error');
                    }
                })
                .catch(error => {
                    console.error('error', error);
                    alert('error');
                });
        }

        document.querySelectorAll('input[type="checkbox"][data-bootstrap-switch]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const Id = this.getAttribute('data-id');
                const status = this.checked ? 1 : 0;

                fetch(`/admin/sliders/change-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: Id,
                            status: status
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            // location.reload();
                        } else {
                            alert('error');
                            this.checked = !this.checked;
                        }
                    })
                    .catch(error => {
                        console.error('error', error);
                        alert('error');
                        this.checked = !this.checked;
                    });
            });
        });
    </script>

@endsection
