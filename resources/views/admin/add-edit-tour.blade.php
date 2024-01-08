@extends('layouts.admin')
@section('title', 'Kikos - Tour')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assets('assets/admin-css/tour.css') }}">
    <script src="{{ assets('assets/admin-js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ assets('assets/admin-plugins/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
@endpush
@section('content')
    <div class="page-breadcrumb-title-section">
        <h4>Manage Tour</h4>
    </div>
    <div class="body-main-content">
        <div class="addtour-section">
            <div class="create-addtour-heading">
                <h3>{{ $data ? 'Edit' : 'Add' }} Tour</h3>
            </div>
            <div class="addtour-form">
                <form action="{{ $data ? route('UpdateTour') : route('SaveTour') }}" method="POST"
                    enctype="multipart/form-data"id="add_edit_tour">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="pid" value="{{ $data->id ?? '' }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Tour Title</h4>
                                <input type="text" class="form-control" name="title"
                                    placeholder="Enter Tour Title Here…" value="{{ $data ? $data->title : old('title') }}">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Tour Name</h4>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Enter Tour Name Here…" value="{{ $data ? $data->name : old('name') }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" id="People Ages 11+"
                                                name="age_11"@if (!empty($data)) checked @endif>
                                            <label for="People Ages 11+">People Ages 11+</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="text" min="0" class="form-control" name="age_11_price"
                                                placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->age_11_price == '' : old('age_11_price') }}">
                                        </div>
                                    </div>
                                    @error('age_11_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" name="age_60" id="Senior Ages 60+"
                                                @if (!empty($data)) checked @endif>
                                            <label for="Senior Ages 60+">Senior Ages 60+</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="text" min="0" class="form-control" name="age_60_price"
                                                placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->age_60_price : old('age_60_price') }}">
                                        </div>

                                    </div>
                                    @error('age_60_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" name="age_under_10"
                                                id="Children Ages 10 & Under"@if (!empty($data)) checked @endif>
                                            <label for="Children Ages 10 & Under">Children Ages 10 & Under</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="text" min="0" class="form-control"
                                                name="under_10_age_price" placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->under_10_age_price : old('under_10_age_price') }}">
                                        </div>

                                    </div>
                                    @error('under_10_age_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="kikcheckbox1">
                                            <input type="checkbox" name="for_all"
                                                id="Same for all"@if (!empty($data->same_for_all)) checked @endif>
                                            <label for="Same for all">Same for all</label>
                                        </div>
                                        <div class="form-group-input">
                                            <input type="text" min="0" class="form-control" name="same_for_all"
                                                placeholder="Enter Price/Person(in $)"
                                                value="{{ $data ? $data->same_for_all : old('same_for_all') }}">
                                        </div>

                                    </div>
                                    @error('same_for_all')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>Tour Duration</h4>
                                        <input type="text" min="0" class="form-control" name="duration"
                                            placeholder="0 Hours"
                                            value="{{ $data ? $data->duration : old('duration') }}">
                                    </div>
                                    @error('duration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>Total People Occupancy</h4>
                                        <div class="People-form-group">
                                            <input type="text" min="0" class="form-control"
                                                name="total_people" placeholder="0"
                                                value="{{ $data ? $data->total_people : old('total_people') }}">
                                            <span>Person</span>
                                        </div>

                                    </div>
                                    @error('total_people')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>Start Date</h4>
                                        <input type="date" class="form-control" name="start_date">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4>End Date</h4>
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                </div> --}}


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>What To Bring</h4>
                                        <input type="text" class="form-control" name="what_to_bring"
                                            placeholder="What To Bring"
                                            value="{{ $data ? $data->what_to_bring : old('what_to_bring') }}">
                                    </div>
                                    @error('duration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Short Description</h4>
                                <textarea type="text" rows="2" cols="30" class="form-control" name="short_description"
                                    placeholder="Short Description…">{{ $data ? $data->short_description : old('short_description') }}</textarea>
                            </div>
                            @error('short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Description</h4>
                                <textarea type="text" rows="7" cols="80" class="form-control" name="description"
                                    placeholder="Description…">{{ $data ? $data->description : old('description') }}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Cancellation Policy</h4>
                                <textarea type="text" rows="7" cols="80" class="form-control" name="cancellation_policy"
                                    placeholder="Enter Cancellation Policy…">{{ $data ? $data->cancellation_policy : old('cancellation_policy') }}</textarea>
                            </div>
                            @error('cancellation_policy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="create-review-form-group form-group">
                                <h4>Browse & Upload Tour Photos <a class="addmorefile" href="">
                                        {{-- <img src="{{ asset('assets/admin-images/add-file.svg') }}"> --}}
                                    </a>
                                </h4>
                                <div class="create-review-form-input">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="upload-form-group">
                                                <div class="upload-file">
                                                    <input type="file" name="thumbnail[]" accept=".jpg,.jpeg,.png"
                                                        id="addfile1" class="uploadDoc addDoc">
                                                    <label for="addfile1">
                                                        <div class="upload-file-item">
                                                            <div class="upload-media">
                                                                <img id="image_addfile1"
                                                                    src="{{ asset('public/assets/admin-images/upload-icon.svg') }}">
                                                            </div>
                                                            <div class="upload-text">
                                                                <span>Browse & Upload File</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="upload-form-group">
                                                <div class="upload-file">
                                                    <input type="file" name="thumbnail[]" accept=".jpg,.jpeg,.png"
                                                        id="addfile2" class="uploadDoc addDoc">
                                                    <label for="addfile2">
                                                        <div class="upload-file-item">
                                                            <div class="upload-media">
                                                                <img
                                                                    src="{{ asset('public/assets/admin-images/upload-icon.svg') }}">
                                                            </div>
                                                            <div class="upload-text">
                                                                <span>Browse & Upload File</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="upload-form-group">
                                                <div class="upload-file">
                                                    <input type="file" name="thumbnail[]" accept=".jpg,.jpeg,.png"
                                                        id="addfile3" class="uploadDoc addDoc">
                                                    <label for="addfile3">
                                                        <div class="upload-file-item">
                                                            <div class="upload-media">
                                                                <img
                                                                    src="{{ asset('public/assets/admin-images/upload-icon.svg') }}">
                                                            </div>
                                                            <div class="upload-text">
                                                                <span>Browse & Upload File</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="upload-form-group">
                                                <div class="upload-file">
                                                    <input type="file" name="thumbnail[]" accept=".jpg,.jpeg,.png"
                                                        id="addfile4" class="uploadDoc addDoc">
                                                    <label for="addfile4">
                                                        <div class="upload-file-item">
                                                            <div class="upload-media">
                                                                <img
                                                                    src="{{ asset('public/assets/admin-images/upload-icon.svg') }}">
                                                            </div>
                                                            <div class="upload-text">
                                                                <span>Browse & Upload File</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="cancelbtn" style="background-color: red" type="button"
                                    data-bs-toggle="modal" data-bs-target="#deletepopup"
                                    onclick='GetData("{{ $data->id }}","{{ $data->title }}")'>
                                    Delete</button>
                                <button class="cancelbtn" type="button"
                                    onclick="window.location.reload();">cancel</button>
                                <button class="Savebtn" type="submit">{{ $data ? 'Update' : 'Save & Create Tour' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete popup -->
    <div class="modal kik-modal fade" id="deletepopup" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="iot-modal-delete-form">
                        <div class="kik-modal-delete-card">
                            <div class="kik-modal-delete-icon">
                                <img src="{{ assets('assets/admin-images/delete-icon.svg') }}">
                            </div>
                            <h3>Are You sure you want to delete?</h3>
                            <h4 id="Name"></h4>
                            <div class="kik-modal-action">
                                <form action="{{ route('DeleteTour') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="tour_id">
                                    <button class="yesbtn"type="submit">Yes Confirm Delete</button>
                                    <button class="Cancelbtn" type="button"data-bs-dismiss="modal"
                                        aria-label="Close"onClick="window.location.reload();">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------- Append delete Popup Jquery -------------------->
    <script>
        function GetData(IDS, Name) {
            document.getElementById("Name").innerText =
                Name;
            document.getElementById("tour_id").value = IDS;
        }
    </script>
@endsection
@push('js')
    {{-- form validation --}}
    <script>
        $(document).ready(function() {
            $('#add_edit_tour').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 6,
                        maxlength: 255,
                    },
                    name: {
                        required: true,
                        minlength: 6,
                        maxlength: 255,
                    },
                    total_people: {
                        required: true,
                        digits: true,
                    },

                    age_under_10: {
                        //required: true,
                        // digits: true,
                    },
                    under_10_age_price: {
                        //required: true,
                        digits: true,
                    },

                    age_11_price: {
                        //required: true,
                        digits: true,
                    },
                    age_11: {
                        //required: true,
                        // digits: true,
                    },

                    age_60_price: {
                        //required: true,
                        digits: true,
                    },
                    age_60: {
                        //required: true,
                        // digits: true,
                    },

                    for_all: {
                        //required: true,
                        //digits: true,
                    },
                    for_all_price: {
                        //required: true,
                        digits: true,
                    },

                    what_to_bring: {
                        required: true,
                        minlength: 6,
                        maxlength: 255,
                    },

                    duration: {
                        required: true,
                        digits: true,
                    },

                    short_description: {
                        required: true,
                    },

                    description: {
                        required: true,
                    },

                    cancellation_policy: {
                        required: true,
                    },

                    thumbnail: {
                        required: true,
                    },
                },
                //errorElement: "small",
                submitHandler: function(form) {
                    // This function will be called when the form is valid and ready to be submitted
                    form.submit();
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
            })
        });
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Select all elements with the class "add"
            let elementsWithClass = document.querySelectorAll('.uploadDoc');
            // Add an event listener to each element
            elementsWithClass.forEach(function(element) {
                element.addEventListener('change', function(event) {
                    // Your event handling code goes here
                    const file = event.target.files[0];

                    const imgURL = URL.createObjectURL(file);

                    let label = document.querySelector(
                        `[for="${element.getAttribute("id")}"]`);
                    label.style.backgroundImage = `url("${imgURL}")`;
                    label.style.backgroundPosition = 'center';
                    label.style.backgroundSize = 'cover';

                    var op = label.querySelector(".upload-file-item");
                    op.style.opacity = 0;
                });
            });
        });
    </script>
@endpush
