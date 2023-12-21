@extends('layouts.admin')
@section('title', 'Kikos - Manage Photo-Booth')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assets('assets/admin-css/taxi-booking-requests.css') }}">
    <script src="{{ assets('assets/admin-js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ assets('assets/admin-plugins/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
    <div class="page-breadcrumb-title-section">
        <h4>Taxi Booking requests</h4>
    </div>
    <div class="body-main-content">

        <div class="booking-availability-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="kikcard">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="mr-auto">
                                    <h4 class="heading-title">Booking Requests</h4>
                                </div>
                                <div class="btn-option-info wd7">
                                    <div class="search-filter">
                                        <div class="search-filter">
                                            <div class="row g-1">

                                                <div class="col-md-3">
                                                    <div class="search-form-group">
                                                        <div class="TotalRequestoverview">Total Request Received:
                                                            <span>{{ $taxi_booking_requests->total() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="search-form-group">
                                                        <input type="text" name="" class="form-control"
                                                            placeholder="Search User name, Amount & virtual tour name..">
                                                        <span class="search-icon"><img
                                                                src="{{ assets('assets/admin-images/search-icon.svg') }}"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="mt-2">
                                                        <a href="{{ route('TaxiBookingRequest') }}"><i class="fa fa-undo"
                                                                aria-hidden="true"></i></a>
                                                        &nbsp;
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="date" name="date"
                                                            value="{{ request()->has('date') ? request('date') : '' }}"
                                                            onchange="location.replace('{{ route('TaxiBookingRequest') }}?date='+this.value)"
                                                            class="form-control">
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <a href="#" class="btn-gr" onclick="exportToCSV(this)"
                                                            data-id="taxi_booking_requests">Download Data</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="kik-table">
                                <table class="table xp-table  " id="taxi_booking_requests">
                                    <thead>
                                        <tr class="table-hd">
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Booking ID</th>
                                            <th>Booking Date & Time</th>
                                            <th>Pickup Location</th>
                                            <th>Drop Off Location</th>
                                            <th>Travel Distanse </th>
                                            <th>Hotel Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($taxi_booking_requests as $i=> $item)
                                            <tr>
                                                <td>
                                                    <div class="sno">{{ $i + 1 }}</div>
                                                </td>
                                                <td>{{ $item->user ? $item->user->fullname : 'N/A' }}</td>
                                                <td>TR0619879238351</td>
                                                <td>{{ date('d M, Y, h:i:s a', strtotime($item->booking_time)) }}

                                                <td>{{ $item->pickup_location }}</td>
                                                <td>{{ $item->drop_location }}</td>

                                                <td>{{ $item->distance }} KM</td>
                                                <td> {{ $item->hotel_name }} </td>
                                                <td>
                                                    <div class="action-btn-info">
                                                        <a class="action-btn dropdown-toggle" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="las la-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item view-btn" href="users-detail.html"><i
                                                                    class="las la-eye"></i> View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" align="center"> No Booking requests</td>
                                            </tr>
                                        @endforelse



                                    </tbody>
                                </table>
                            </div>
                            <div class="kik-table-pagination">
                                <ul class="kik-pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($taxi_booking_requests->onFirstPage())
                                        <li class="disabled">
                                            <span>Previous</span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $taxi_booking_requests->previousPageUrl() }}"
                                                aria-controls="example" tabindex="0" class="page-link"
                                                data-dt-idx="{{ $taxi_booking_requests->currentPage() - 2 }}">Previous</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($taxi_booking_requests->getUrlRange(1, $taxi_booking_requests->lastPage()) as $page => $url)
                                        <li class="{{ $page == $taxi_booking_requests->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $url }}" aria-controls="example" tabindex="0"
                                                class="page-link"
                                                data-dt-idx="{{ $page - 1 }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($taxi_booking_requests->hasMorePages())
                                        <li>
                                            <a href="{{ $taxi_booking_requests->nextPageUrl() }}" aria-controls="example"
                                                tabindex="0" class="page-link"
                                                data-dt-idx="{{ $taxi_booking_requests->currentPage() }}">Next</a>
                                        </li>
                                    @else
                                        <li class="disabled">
                                            <span>Next</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function exportToCSV(ele) {
            // Get table data
            var table = document.getElementById(ele.getAttribute("data-id"));
            var rows = table.querySelectorAll('tbody tr');

            // Create CSV content
            var csvContent = "data:text/csv;charset=utf-8,";
            csvContent += headersToCSV(table);
            csvContent += rowsToCSV(rows);

            // Create and trigger a download link
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", ele.getAttribute("data-id") + '.csv');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function headersToCSV(table) {
            var headers = [];
            var headerCols = table.querySelectorAll('thead th');
            for (var i = 0; i < headerCols.length; i++) {
                headers.push(headerCols[i].innerText);
            }
            return headers.join(',') + '\n';
        }

        function rowsToCSV(rows) {
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
                var row = [];
                var cols = rows[i].querySelectorAll('td');
                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
                }
                csv.push(row.join(','));
            }
            return csv.join('\n');
        }
    </script>
@endsection
