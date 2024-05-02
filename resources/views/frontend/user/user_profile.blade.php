@extends('layouts.frontend')
@section('content')
    <div class="row" style="margin-top: 100px">
        <div class="col-lg-8 offset-lg-2">
            <div class="card mx-auto">
                <div class="card-header position-relative"
                    style="background: linear-gradient(0deg, rgba(94, 94, 94, 0.684), rgba(96, 96, 96, 0.684)), url('{{ asset('dashboard-assets') }}/images/media/img-1.jpg') no-repeat center/cover !important; padding:90px 0px;">
                    @if (auth()->user()->photo)
                        <img class="text-center mx-auto rounded-circle position-absolute"
                            style="width: 150px; height: 150px; border:8px solid #E6E6E6;bottom:0px;left:0px;transform:translate(20px,50%);"
                            src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->photo }}" alt="Card image cap" />
                    @else
                        <img class="text-center mx-auto rounded-circle position-absolute"
                            style="width: 150px; height: 150px; border:8px solid #E6E6E6;bottom:0px;left:0px;transform:translate(20px,50%);"
                            src="{{ asset('dashboard-assets/images/default_profile.png') }}" alt="Card image cap" />
                    @endif
                </div>
                <div class="card-body" style="padding-top: 30px; padding-bottom:100px">
                    <div class="row" style="margin-bottom: 60px">
                        <div class="col-lg-3 offset-lg-3">
                            <h3>{{ auth()->user()->name }}</h3>
                            <span>{{ auth()->user()->email }}</span>
                            <p>{{ auth()->user()->role }}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-10 offset-lg-1">
                            <form class="" action="{{ route('user_name_change') }}" method="POST">
                                @csrf
                                <div class="row mx-auto">
                                    <label class="col-md-3 col-form-label">Chnage Name</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="new_name">
                                            <button class="btn btn-dark waves-effect waves-light"
                                                type="submit">Change</button>
                                        </div>
                                        @error('new_name')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-10 offset-lg-1">
                            <form class="" action="{{ route('user_profile_picture') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-auto">
                                    <label class="col-md-3 col-form-label">Update profile Picture</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="profile_photo">
                                            <button class="btn btn-dark waves-effect waves-light"
                                                type="submit">Upload</button>
                                        </div>
                                        @error('profile_photo')
                                            <p class="text-danger mt-2 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-4">
                        @if ($otp_check == null)
                            <div class="col-lg-10 offset-lg-1">
                                <form class="" action="{{ route('user_email_change') }}" method="POST">
                                    @csrf
                                    <div class="row mx-auto">
                                        <label class="col-md-3 col-form-label">Change Email</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="new_email">
                                                <button class="btn btn-dark waves-effect waves-light" type="submit">Change
                                                    Email</button>
                                            </div>
                                            @error('new_email')
                                                <p class="text-danger mt-2 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="col-lg-10 offset-lg-1">
                                <form class="" action="{{ route('user_otp_verify') }}" method="POST">
                                    @csrf
                                    <div class="row mx-auto">
                                        <label class="col-md-3 col-form-label">OTP</label>
                                        <div class="col-md-9">
                                            <input type="email" class="d-none" name="new_email"
                                                value="{{ $new_email }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="otp">
                                                <button class="btn btn-dark waves-effect waves-light"
                                                    type="submit">Verify</button>
                                            </div>
                                            @error('otp')
                                                <p class="text-danger mt-2 mb-0">{{ $message }}</p>
                                            @enderror
                                            @if ($otp_sent)
                                                <p class="text-warning mt-2 mb-0">{{ $otp_sent }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
    </div>
@endsection
