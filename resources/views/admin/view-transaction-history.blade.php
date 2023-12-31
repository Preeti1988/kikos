@extends('layouts.admin')
@section('title', 'Kikos - Manage Booking')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assets('assets/admin-css/managebooking.css') }}">
@endpush
@section('content')
    <div class="page-breadcrumb-title-section">
        <h4>Manage Booking</h4>
    </div>
    <div class="body-main-content">


        <div class="booking-availability-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="kikcard">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="mr-auto">
                                    <h4 class="heading-title">View Transaction History</h4>
                                </div>
                                <div class="btn-option-info wd8">
                                    <div class="search-filter">
                                        <div class="row g-1">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="TotalRequestoverview">Total Request Received:
                                                        <span>5689</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="search-form-group">
                                                        <input type="text" name="" class="form-control"
                                                            placeholder="Search User name, Amount & Status">
                                                        <span class="search-icon"><img
                                                                src="{{ assets('assets/admin-images/search-icon.svg') }}"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>Select Tour</option>
                                                        <option>West Oahu</option>
                                                        <option>Sunrise Hike</option>
                                                        <option>Foodie & Farm Tour</option>
                                                        <option>7 Am Hike</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="date" name="" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="#" class="btn-gr">Download report</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="kik-table">
                                <table class="table xp-table  " id="customer-table">
                                    <thead>
                                        <tr class="table-hd">
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Tour Name</th>
                                            <th>Duration</th>
                                            <th>Amount Paid</th>
                                            <th>Tour Book Date</th>
                                            <th>Person</th>
                                            <th>Amount Recieved On</th>
                                            <th>Payment Made Via</th>
                                            <th>Status</th>
                                            <th>Transaction ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="sno">1</div>
                                            </td>
                                            <td>John</td>
                                            <td>North Shore</td>
                                            <td>8 Hours</td>
                                            <td>16/02/2023</td>
                                            <td>$559.00</td>
                                            <td> 4 People </td>
                                            <td> 03 Sep, 2023, 09:33:12 am </td>
                                            <td> PayPal </td>
                                            <td>
                                                <div class="status-text confirmed-status"><i
                                                        class="las la-check-circle"></i> Confirmed</div>
                                            </td>
                                            <td> 76375873874 </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="sno">2</div>
                                            </td>
                                            <td>John</td>
                                            <td>North Shore</td>
                                            <td>8 Hours</td>
                                            <td>16/02/2023</td>
                                            <td>$559.00</td>
                                            <td> 4 People </td>
                                            <td> 03 Sep, 2023, 09:33:12 am </td>
                                            <td> PayPal </td>
                                            <td>
                                                <div class="status-text rejected-status"><i class="las la-times-circle"></i>
                                                    Rejected (Refund Initiated)</div>
                                            </td>
                                            <td> 76375873874 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="kik-table-pagination">
                                <ul class="kik-pagination">
                                    <li class="disabled" id="example_previous">
                                        <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a>
                                    </li>
                                    <li class="active">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="">
                                        <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a>
                                    </li>
                                    <li class="">
                                        <a href="#" aria-controls="example" data-dt-idx="3" tabindex="0"
                                            class="page-link">3</a>
                                    </li>
                                    <li class="next" id="example_next">
                                        <a href="#" aria-controls="example" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
