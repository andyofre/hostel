@extends('layouts.include.admin.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">

@if(Session::has('success_message'))
    <div class="alert alert-success solid  fade show" role="alert" style="margin-top:3px; font-family:Bahnschrift; font-size:19px;">

        {{Session::get('success_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
@endif

        <h5 class="mb-30 text-dark">Student verfication profile</h5>
        <hr>
    </div>
    <div class="wizard-content py-3">
        <form action="{{ route('hostel.store') }}" method="POST">
            {{-- <h5>Personal Info</h5> --}}
            @include('sweetalert::alert')

            @csrf
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Hostel Name</label>
                            <input type="text" class="form-control @error('fullName') is-invalid @enderror" name="hostel_name" >
                            @error('hostel_name')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Hostel Type</label>
                            <select class="form-select form-control @error('hostel_type') is-invalid @enderror" name="hostel_type">
                                <option selected='' disabled>Select type</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                            @error('hostel_type')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror

                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Number of Rooms</label>
                            <input type="text" class="form-control @error('number_of_rooms') is-invalid @enderror" name="number_of_rooms">
                            @error('number_of_rooms')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hostel Photo</label>
                                <input type="file" class="form-control @error('building_photo') is-invalid @enderror" name="building_photo" >
                                @error('building_photo')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description_location" cols="20" rows="5" class="form-control" ></textarea>
                                {{-- <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password"> --}}
                                @error('description_location')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                        </div>
                    </div>

                </div>


                <div class="input-group mb-0 py-3">

                    <button class="btn btn-primary">Submit</button>

                </div>
            </section>


        </form>
    </div>
</div>
@endsection
