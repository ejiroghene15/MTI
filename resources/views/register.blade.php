@extends('layout.master')
@section('title', 'Register')
@section('body')
@include('partials.nav')

<main id="registration_page">
    <form action="{{ route('new_registration') }}" method="post">
        @csrf
        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif
        <div class="form-wrapper">
            <header>Create an account </header>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control form-control-alternative" name="fname" value="{{ old('fname') }}" autocomplete="off">
                        @error('fname') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control form-control-alternative" name="lname" value="{{ old('lname') }}" autocomplete="off">
                        @error('lname') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control form-control-alternative" name="email" value="{{ old('email') }}" autocomplete="off">
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
                            <option value="Web Design">Web Design</option>
                            <option value="Graphic Design">Graphic Design</option>
                            <option value="Catering">Catering</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">@error('password') <p class="form-error">{{ $message }}</p> @enderror</div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control form-control-alternative" name="password">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control form-control-alternative" name="confirm_password">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button class="btn btn-default text-capitalize">Register</button>
            </div>

        </div>

    </form>
</main>

@include('partials.footer')
@endsection
