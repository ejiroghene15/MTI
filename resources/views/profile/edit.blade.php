@php
$profile_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "Edit Article")

@section('content')
<div class="content">
    <section for="alert">
        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif
    </section>

    <header class="content-header">
        <p>Edit Profile</p>
    </header>

    <div class="form-wrapper">

        <div class="form-row justify-content-between flex-column-reverse flex-md-row" style="column-gap: 2em">

            <div class="col mt-3">
                <form action="{{ route('upload_profile_pix') }}" method="post" enctype="multipart/form-data"
                    class="mb-5">
                    @csrf
                    {{-- <h5 class="mb-3">Change your profile image</h5> --}}
                    <div class="form-group">
                        <label for="">Profile Picture</label>
                        <input type="file" class="form-control dropify" name="profilepix" accept="image/*"
                            data-default-file="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg">
                        @error('profilepix') <p class=" form-error text-danger">{{ $message }}</p> @enderror
                    </div>

                    <button class="btn btn-default text-capitalize">Change image</button>

                </form>

                <form method="POST" action="{{ route('update_password') }}">
                    @csrf
                    <h5 class="mb-3">Change your password</h5>

                    <div class="form-group">
                        <label for="">Enter old password</label>
                        <input type="password" class="form-control" name="old_password">
                        @error('old_password') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('new_password') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Confirm New Password</label>
                        <input type="password" class="form-control" name="confirm_password">
                        @error('confirm_password') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group w-100 pb-3">
                        <button class="btn btn-default text-capitalize">Change password</button>
                    </div>

                </form>
            </div>

            <div class="col-md-7">
                <form method="POST" action="{{ route('update_profile') }}" class="form-row my-lg-3">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="fname" value="{{ $user->first_name }}"
                                autocomplete="off">
                            @error('fname') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="{{ $user->last_name }}"
                                autocomplete="off">
                            @error('lname') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone_number }}"
                                autocomplete="off">
                            @error('phone') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{ $user->facebook }}"
                                autocomplete="off">
                            @error('facebook') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{ $user->twitter }}"
                                autocomplete="off">
                            @error('twitter') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" value="{{ $user->linkedin }}"
                                autocomplete="off">
                            @error('linkedin') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Reddit</label>
                            <input type="text" class="form-control" name="reddit" value="{{ $user->reddit }}"
                                autocomplete="off">
                            @error('reddit') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea rows="6" class="form-control" name="bio"
                                placeholder="A bit about yourself"> {{ $user->bio }} </textarea>
                        </div>
                    </div>

                    <div class="form-group w-100 py-4">
                        <button class="btn btn-default text-capitalize">Update Profile</button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
@endsection

@section('scripts')
@parent
@include('articles.script')
@endsection
