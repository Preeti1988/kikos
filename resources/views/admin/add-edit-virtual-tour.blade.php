@extends('layouts.admin')
@section('title', 'Kikos - Add Virtual-tour')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assets('assets/admin-css/managevertualtour.css') }}">
    <script src="{{ assets('assets/admin-js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ assets('assets/admin-plugins/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
@endpush
@section('content')
    <div class="page-breadcrumb-title-section">
        <h4>Manage Virtual Tour</h4>
    </div>
    <div class="body-main-content">
        <div class="addVirtualtour-section">
            <div class="addVirtualtour-heading">
                <h3>Add New Virtual Tour</h3>
            </div>
            <div class="addVirtualtour-form">
                <form action="{{ $data ? route('UpdateVirtualTour') : route('SaveVirtualTour') }}" method="POST"
                    enctype="multipart/form-data" id="add_edit_virtual_tour">
                    @csrf
                    <input type="hidden" name="pid" value="{{ $data->id ?? '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Virtual Tour Name</h4>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $data ? $data->name : old('name') }}"
                                    placeholder="Enter Virtual Tour Name Here…">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <h4>Set Price</h4>
                                <div class="People-form-group">
                                    <input type="number" class="form-control" name="price"
                                        value="{{ $data ? $data->price : old('price') }}"placeholder="0">
                                    <span>Per purchase</span>
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h4>Set Trial Audio Mins</h4>
                                <div class="People-form-group">
                                    <input type="number" class="form-control" name="minute"
                                        value="{{ $data ? $data->minute : old('minute') }}"placeholder="0">
                                    <span>Mins only!!</span>
                                </div>
                                @error('minute')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Description</h4>
                                <textarea type="text" class="form-control" rows="7" cols="80" name="description"
                                    placeholder="Description…">{{ $data ? $data->description : old('description') }}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Cancellation Policy</h4>
                                <textarea type="text" class="form-control" rows="7" cols="80" name="cencellation_policy"
                                    placeholder="Enter Cancellation Policy…">{{ $data ? $data->cencellation_policy : old('cencellation_policy') }}</textarea>
                            </div>
                            @error('cencellation_policy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Browse & Upload Virtual Audio File</h4>
                                <input type="file" class="file-form-control" name="audio" accept=".mp3">
                            </div>
                            @error('audio')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Upload Thumbnail Photos</h4>
                                <input type="file" class="file-form-control" name="thumbnail"
                                    accept=".png, .jpg, .jpeg, .svg">
                            </div>
                            @error('thumbnail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($data ? $data->audio_file : '')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <audio controls>
                                        <source src="horse.ogg" type="audio/ogg">
                                        <source src="{{ assets('upload/virtual-audio/' . $data->audio_file) }}"
                                            type="audio/mpeg"> Your
                                        browser does
                                        not support the audio
                                        element.
                                    </audio>
                                </div>
                            </div>
                        @endif



                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="cancelbtn"onClick="window.location.reload();">cancel</button>
                                <button
                                    class="Savebtn"type="submit">{{ $data ? 'Update' : 'Save & Create Virtual Tour' }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection