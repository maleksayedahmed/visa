@extends('template.admin.layouts.master')
@section('title', __('translation.dashboard'))

@section('css')
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <div class="page-title-right">
                                <form class="float-sm-end mt-3 mt-sm-0">
                                    <div class="row g-2">
                                        <div class="col-md-auto">
                                            <div class="mb-1 mb-sm-0">
                                                <input type="text" class="form-control" id="dash-daterange"
                                                    style="min-width: 210px;" />
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='uil uil-file-alt me-1'></i>Download
                                                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item notify-item">
                                                        <i data-feather="mail" class="icon-dual icon-xs me-2"></i>
                                                        <span>Email</span>
                                                    </a>
                                                    <a href="#" class="dropdown-item notify-item">
                                                        <i data-feather="printer" class="icon-dual icon-xs me-2"></i>
                                                        <span>Print</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item notify-item">
                                                        <i data-feather="file" class="icon-dual icon-xs me-2"></i>
                                                        <span>Re-Generate</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Today Revenue</span>
                                        <h3 class="mb-0">$2100</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-revenue-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13">
                                            <i class='uil uil-arrow-up'></i> 10.21%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Product Sold</span>
                                        <h3 class="mb-0">558</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-product-sold-chart" class="apex-charts"></div>
                                        <span class="text-danger fw-bold fs-13">
                                            <i class='uil uil-arrow-down'></i> 5.05%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">New Customers</span>
                                        <h3 class="mb-0">65</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-new-customer-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13">
                                            <i class='uil uil-arrow-up'></i> 25.16%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">NewVisitors</span>
                                        <h3 class="mb-0">958</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-new-visitors-chart" class="apex-charts"></div>
                                        <span class="text-danger fw-bold fs-13">
                                            <i class='uil uil-arrow-down'></i> 5.05%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- stats + charts -->
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="p-3">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-refresh me-2"></i>Refresh
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-user-plus me-2"></i>Add New
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class="uil uil-exit me-2"></i>Exit
                                            </a>
                                        </div>
                                    </div>

                                    <h5 class="card-title header-title mb-0">Overview</h5>
                                </div>

                                <!-- stat 1 -->
                                <div class="d-flex p-3 border-bottom">
                                    <div class="flex-grow-1">
                                        <h4 class="mt-0 mb-1 fs-22">121,000</h4>
                                        <span class="text-muted">Total Visitors</span>
                                    </div>
                                    <i data-feather="users" class="align-self-center icon-dual icon-md"></i>
                                </div>

                                <!-- stat 2 -->
                                <div class="d-flex p-3 border-bottom">
                                    <div class="flex-grow-1">
                                        <h4 class="mt-0 mb-1 fs-22">21,000</h4>
                                        <span class="text-muted">Total Product Views</span>
                                    </div>
                                    <i data-feather="image" class="align-self-center icon-dual icon-md"></i>
                                </div>

                                <!-- stat 3 -->
                                <div class="d-flex p-3 border-bottom">
                                    <div class="flex-grow-1">
                                        <h4 class="mt-0 mb-1 fs-22">$21.5</h4>
                                        <span class="text-muted">Revenue Per Visitor</span>
                                    </div>
                                    <i data-feather="shopping-bag" class="align-self-center icon-dual icon-md"></i>
                                </div>

                                <a href="" class="p-2 d-block text-end">View All <i
                                        class="uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Today
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            7 Days
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            15 Days
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            1 Months
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            6 Months
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            1 Year
                                        </a>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0 header-title">Revenue</h5>

                                <div id="revenue-chart" class="apex-charts mt-3" dir="ltr"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-refresh me-2"></i>Refresh
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-user-plus me-2"></i>Add New
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                                            <i class="uil uil-exit me-2"></i>Exit
                                        </a>
                                    </div>
                                </div>

                                <h5 class="card-title header-title">Targets</h5>
                                <div id="targets-chart" class="apex-charts mt-3" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <!-- products -->
                <div class="row">
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-refresh me-2"></i>Refresh
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-user-plus me-2"></i>Add New
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                                            <i class="uil uil-exit me-2"></i>Exit
                                        </a>
                                    </div>
                                </div>
                                <h5 class="card-title mt-0 mb-0 header-title">Sales By Category</h5>
                                <div id="sales-by-category-chart" class="apex-charts mb-0 mt-4" dir="ltr">
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="btn btn-primary btn-sm float-end">
                                    <i class='uil uil-export me-1'></i> Export
                                </a>
                                <h5 class="card-title mt-0 mb-0 header-title">Recent Orders</h5>

                                <div class="table-responsive mt-4">
                                    <table class="table table-hover table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#98754</td>
                                                <td>ASOS Ridley High</td>
                                                <td>Otto B</td>
                                                <td>$79.49</td>
                                                <td><span class="badge badge-soft-warning py-1">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>#98753</td>
                                                <td>Marco Lightweight Shirt</td>
                                                <td>Mark P</td>
                                                <td>$125.49</td>
                                                <td><span class="badge badge-soft-success py-1">Delivered</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#98752</td>
                                                <td>Half Sleeve Shirt</td>
                                                <td>Dave B</td>
                                                <td>$35.49</td>
                                                <td><span class="badge badge-soft-danger py-1">Declined</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#98751</td>
                                                <td>Lightweight Jacket</td>
                                                <td>Shreyu N</td>
                                                <td>$49.49</td>
                                                <td><span class="badge badge-soft-success py-1">Delivered</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#98750</td>
                                                <td>Marco Shoes</td>
                                                <td>Rik N</td>
                                                <td>$69.49</td>
                                                <td><span class="badge badge-soft-danger py-1">Declined</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <!-- widgets -->
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="header-title mb-3">Top Performers</h6>
                                <div class="d-flex border-top pt-2">
                                    <img src="assets/images/users/avatar-7.jpg" class="avatar rounded me-3"
                                        alt="shreyu">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 mb-0 fs-15">Shreyu N</h5>
                                        <h6 class="text-muted fw-normal mt-1 mb-2">Senior Sales Guy</h6>
                                    </div>
                                    <div class="dropdown align-self-center float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-edit-alt me-2"></i>Edit
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-exit me-2"></i>Remove from Team
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class="uil uil-trash me-2"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 border-top pt-2">
                                    <img src="assets/images/users/avatar-9.jpg" class="avatar rounded me-3"
                                        alt="shreyu">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 mb-0 fs-15">Greeva Y</h5>
                                        <h6 class="text-muted fw-normal mt-1 mb-2">Social Media Campaign</h6>
                                    </div>
                                    <div class="dropdown align-self-center float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-edit-alt me-2"></i>Edit
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-exit me-2"></i>Remove from Team
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class="uil uil-trash me-2"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 border-top pt-2">
                                    <img src="assets/images/users/avatar-4.jpg" class="avatar rounded me-3"
                                        alt="shreyu">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 mb-0 fs-15">Nik G</h5>
                                        <h6 class="text-muted fw-normal mt-1 mb-2">Inventory Manager</h6>
                                    </div>
                                    <div class="dropdown align-self-center float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-edit-alt me-2"></i>Edit
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-exit me-2"></i>Remove from Team
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class="uil uil-trash me-2"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 border-top pt-2">
                                    <img src="assets/images/users/avatar-1.jpg" class="avatar rounded me-3"
                                        alt="shreyu">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 mb-0 fs-15">Hardik G</h5>
                                        <h6 class="text-muted fw-normal mt-1 mb-2">Sales Person</h6>
                                    </div>
                                    <div class="dropdown align-self-center float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-edit-alt me-2"></i>Edit
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-exit me-2"></i>Remove from Team
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class="uil uil-trash me-2"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex mt-1 border-top pt-2">
                                    <img src="assets/images/users/avatar-8.jpg" class="avatar rounded me-3"
                                        alt="shreyu">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-1 mb-0 fs-15">GB Patel G</h5>
                                        <h6 class="text-muted fw-normal mt-1 mb-2">Sales Person</h6>
                                    </div>
                                    <div class="dropdown align-self-center float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-edit-alt me-2"></i>Edit
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class="uil uil-exit me-2"></i>Remove from Team
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class="uil uil-trash me-2"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="task-list.html" class="btn btn-primary btn-sm float-end">
                                    View All
                                </a>
                                <h5 class="mb-4 header-title">Tasks</h5>
                                <div data-simplebar class="px-1" style="max-height: 352px;">
                                    <div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task1">
                                            <label class="form-check-label" for="task1">
                                                Draft the new contract document for sales team
                                            </label>
                                            <p class="fs-13 text-muted">Due on 24 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>

                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task2">
                                            <label class="form-check-label" for="task2">
                                                iOS App home page
                                            </label>
                                            <p class="fs-13 text-muted">Due on 23 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>

                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task3">
                                            <label class="form-check-label" for="task3">
                                                Write a release note for Shreyu
                                            </label>
                                            <p class="fs-13 text-muted">Due on 22 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>

                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task4">
                                            <label class="form-check-label" for="task4">
                                                Invite Greeva to a project shreyu admin
                                            </label>
                                            <p class="fs-13 text-muted">Due on 21 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>

                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task5">
                                            <label class="form-check-label" for="task5">
                                                Enable analytics tracking for main website
                                            </label>
                                            <p class="fs-13 text-muted">Due on 20 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>

                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task6">
                                            <label class="form-check-label" for="task6">
                                                Invite user to a project
                                            </label>
                                            <p class="fs-13 text-muted">Due on 18 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>

                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="task7">
                                            <label class="form-check-label" for="task7">
                                                Write a release note
                                            </label>
                                            <p class="fs-13 text-muted">Due on 14 Aug, 2019</p>
                                        </div> <!-- end checkbox -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-refresh me-2"></i>Refresh
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-user-plus me-2"></i>Add New
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                                            <i class="uil uil-exit me-2"></i>Exit
                                        </a>
                                    </div>
                                </div>
                                <h4 class="header-title mb-4">Recent Conversation</h4>

                                <div class="chat-conversation">
                                    <div data-simplebar style="height: 314px;">
                                        <ul class="conversation-list">
                                            <li class="clearfix">
                                                <div class="chat-avatar">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="male">
                                                    <i>10:00</i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i>Geneva</i>
                                                        <p>Hello!</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix odd">
                                                <div class="chat-avatar">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="Female">
                                                    <i>10:01</i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i>Dominic</i>
                                                        <p>Hi, How are you? What about our next meeting?</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="chat-avatar">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="male">
                                                    <i>10:01</i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i>Geneva</i>
                                                        <p>Yeah everything is fine</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix odd">
                                                <div class="chat-avatar">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="male">
                                                    <i>10:02</i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i>Dominic</i>
                                                        <p>Wow that's great</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <form class="needs-validation" novalidate name="chat-form" id="chat-form">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control chat-input"
                                                    placeholder="Enter your text" required>
                                                <div class="invalid-feedback">
                                                    Please enter your messsage
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit"
                                                    class="btn btn-danger chat-send w-100 waves-effect waves-light">Send</button>
                                            </div>
                                        </div>
                                    </form>

                                </div> <!-- end .chat-conversation-->
                            </div>
                        </div> <!-- end card-->
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('template.admin.layouts.footer')

    </div>
@endsection


@section('js')
@endsection
