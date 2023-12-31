@extends('layouts.admin')
@section('title', 'Kikos - Tour')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assets('assets/admin-css/tour.css') }}">
@endpush
@section('content')
    <div class="page-breadcrumb-title-section">
        <h4>Manage Tour</h4>
    </div>
    <div class="body-main-content">
        <div class="addtour-section">
            <div class="create-addtour-heading">
                <h3>Add New Tour</h3>
            </div>
            <div class="addtour-form">
                {{-- <form action="{{ $data ? route('UpdateTour') : route('SaveTour') }}" method="POST"
                    enctype="multipart/form-data"id="add_edit_tour"> --}}
                <form action="{{ route('SaveTour') }}" method="POST" enctype="multipart/form-data" id="add_edit_tour">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="userid" value="{{ $data->id ?? '' }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Tour Title</h4>
                                <input type="text" class="form-control" name="title"
                                    placeholder="Enter Tour Title Here…" value="{{ $data ? $data->title : old('title') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Tour Name</h4>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Enter Tour Name Here…" value="{{ $data ? $data->name : old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" id="People Ages 11+" name="age_11">
                                            <label for="People Ages 11+">People Ages 11+</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="number" class="form-control" name="age_11_price"
                                                placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->age_11_price : old('age_11_price') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" name="age_60" id="Senior Ages 60+">
                                            <label for="Senior Ages 60+">Senior Ages 60+</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="number" class="form-control" name="age_60_price"
                                                placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->age_60_price : old('age_60_price') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" name="age_under_10" id="Children Ages 10 & Under">
                                            <label for="Children Ages 10 & Under">Children Ages 10 & Under</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="number" class="form-control"name="under_10_age_price"
                                                placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->under_10_age_price : old('under_10_age_price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>Time Duration</h4>
                                        <input type="number" class="form-control txtDate" name="duration"
                                            placeholder="0 Hours" value="{{ $data ? $data->duration : old('duration') }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>Start Date</h4>
                                        <input type="date" class="form-control txtDate" name="start_date">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>End Date</h4>
                                        <input type="date" class="form-control txtDate" name="end_date">
                                    </div>
                                </div> --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>Total People Occupancy</h4>
                                        <div class="People-form-group">
                                            <input type="number" class="form-control" name="total_people" placeholder="0"
                                                value="{{ $data ? $data->total_people : old('total_people') }}">
                                            <span>Person</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Description</h4>
                                <textarea type="text" rows="7" cols="80" class="form-control" name="description"
                                    placeholder="Description…">{{ $data ? $data->description : old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Cancellation Policy</h4>
                                <textarea type="text" rows="7" cols="80" class="form-control" name="cancellation_policy"
                                    placeholder="Enter Cancellation Policy…">{{ $data ? $data->cancellation_policy : old('cancellation_policy') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Browse & Upload Tour Photos</h4>
                                <input type="file" class="file-form-control" name="thumbnail[]"
                                    accept=".png, .jpg, .jpeg" multiple>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="cancelbtn"onClick="window.location.reload();">cancel</button>
                                <button class="Savebtn" type="submit">{{ $data ? 'Update' : 'Save & Create Tour' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('js')
    {{-- Add a function for disable previous date and add a US formate date --}}
    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('.txtDate').attr('min', minDate);
        });
    </script>
    {{-- form validation --}}
    <script>
        $(document).ready(function() {
            $.validator.addMethod("phoneValid", function(value) {
                return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(value);
            }, 'Invalid phone number.');
            $.validator.addMethod("zeroValue", function(value) {
                return value != 0;
            }, 'Please select .');
            $('#add_edit_tour').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    age_11_price: {
                        required: true,
                    },
                    age_60_price: {
                        required: true,
                    },
                    under_10_age_price: {
                        required: true,
                    },
                    duration: {
                        required: true,
                    },
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    element.addClass("invalid-feedback");
                    element.closest(".field").append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $('.please-wait').click();
                    $(element).addClass("invalid-feedback");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("invalid-feedback");
                }
            })
        });
    </script>
@endpush
