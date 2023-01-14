@extends('layouts.include.student.master')
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

        <h5 class="mb-30 text-dark">Upload Profile Image</h5>
        <hr>
    </div>
    <div class="wizard-content py-3">
        <form action="{{ route('profile.post') }}" method="POST">
            {{-- <h5>Personal Info</h5> --}}
            @include('sweetalert::alert')

            @csrf
            <section>
                <div class="row">




                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Profile Image</label>
                                <input type="file" class="form-control @error('profile_photo_path') is-invalid @enderror" name="profile_photo_path" >
                                @error('profile_photo_path')
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
