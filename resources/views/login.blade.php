@extends('layout.master')
@section('title', 'Login')
@section('body')
@include('partials.nav')

<main id="login_page">

    <section class="px-3">

        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif

        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-uppercase mb-sm-3 mb-md-0 @if(!session('register')) active @endif"
                        data-toggle="tab" href="#tab-login" role="tab" aria-selected="true">
                        Login
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-uppercase mb-sm-3 mb-md-0 @if(session('register')) active @endif"
                        data-toggle="tab" href="#tab-register" role="tab" aria-selected="false">Register</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            {{-- login section --}}
            <div class="tab-pane fade @if(!session('register')) show active @endif" id="tab-login" role="tabpanel">
                <form action="{{ route('authenticate_user') }}" method="post">
                    @csrf
                    <div class="form-wrapper">
                        <header class="text-uppercase">Login </header>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <div class="input-group input-group-alternative">
                                <input class="form-control" type="email" name="email" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-group input-group-alternative">
                                <input class="form-control" placeholder="Password" type="password" name="password">
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-4">
                            <button class="btn btn-default btn-block">Sign in with Email</button>
                        </div>
                        <div class="form-group mb-0 my-4">
                            <a href="{{ route('oauth-google') }}" class="btn btn-neutral btn-icon btn-block">
                                <span class="btn-inner--icon"><img src="/images/google.svg"></span>
                                <span class="btn-inner--text">Sign in with Google</span>
                            </a>
                        </div>
                    </div>

                    <a type="button" class="btn btn-block text-default bg-light mb-3"
                        style="color: #fff; margin-top: -5px" data-toggle="modal" data-target="#reset-password">I Forgot
                        my password</a>
                </form>
            </div>

            {{-- registration section --}}
            <div class="tab-pane fade @if(session('register'))show active @endif" id="tab-register" role="tabpanel">
                <form action="{{ route('new_registration') }}" method="post">
                    @csrf
                    <div class="form-wrapper">
                        <header class="text-uppercase">Create an account </header>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control form-control-alternative" name="fname"
                                        value="{{ old('fname') }}" autocomplete="off">
                                    @error('fname') <p class="form-error">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control form-control-alternative" name="lname"
                                        value="{{ old('lname') }}" autocomplete="off">
                                    @error('lname') <p class="form-error">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" class="form-control form-control-alternative" name="email"
                                        value="{{ old('email') }}" autocomplete="off">
                                    @error('email') <p class="form-error">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Register as a</label>
                                    <select name="role" class="form-control form-control-alternative">
                                        <option value="tutor">Tutor</option>
                                        <option value="student">Student</option>
                                        <option value="both">Student & Tutor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Course of Interest</label>
                                    <select name="course" class="form-control form-control-alternative">
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->course_title }}">{{ $course->course_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">@error('password') <p class="form-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control form-control-alternative"
                                        name="password">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control form-control-alternative"
                                        name="confirm_password">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-default text-capitalize">Register</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>

    </section>

    <div class="modal fade" id="reset-password" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0 mb-0">

                        <div class="card-body">
                            <h5 class="text-muted mb-3" style="font-weight: 600">
                                Reset Password
                            </h5>
                            <form role="form" method="POST" action="{{ route('forgot_password') }}">
                                @csrf
                                <div class="form-wrapper px-0">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" name="email" placeholder="Your email address"
                                                type="email" required>
                                        </div>

                                        <p class="form-error"> {{ $errors->reset_password->first('email') }}</p>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success d-block">Send link</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

{{-- @include('partials.footer') --}}
@endsection

@section('js')
@parent
@if(session('verified'))
<script>
    swal("Account Verified", "You can proceed to login!", "success");
</script>
@endif
@endsection
