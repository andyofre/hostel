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

        <h5 class="mb-30 text-dark">Room Details</h5>
        <hr>
    </div>
    <div class="wizard-content py-3">
        <form action="{{ route('room.store') }}" method="POST">
            {{-- <h5>Personal Info</h5> --}}
            @include('sweetalert::alert')

            @csrf
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Room Name</label>
                            <input type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" placeholder="eg. Room 101">
                            @error('room_no')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Hostel Name</label>
                            <select class="form-select form-control @error('hostel_id') is-invalid @enderror" name="hostel_id">
                                <option selected='' disabled>Select type</option>

                                @foreach ($room as $rooms )
                                     <option value="{{ $rooms->getHostel->id }}">{{ $rooms->getHostel->hostel_name }}</option>

                                @endforeach


                            </select>

                            @error('hostel_id')
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
                            <label>Room Type</label>
                            <select class="form-select form-control @error('type') is-invalid @enderror" name="type">
                                <option selected='' disabled>Select type</option>
                                <option value="six_seater">Six Bonks</option>
                                <option value="four_seater">Four Bonks</option>
                                <option value="three_seater">Three Bonks</option>
                            </select>

                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror

                         </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Bed No.</label>
                                <input type="text" class="form-control @error('bed') is-invalid @enderror" name="bed" >
                                @error('bed')
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
