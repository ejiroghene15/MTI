@extends('layout.master')
@section('title', 'Login')
@section('body')
@include('partials.nav')

<main id="login_page">
    <form action="{{ route('authenticate_user') }}" method="post">
        @csrf
        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif
        <div class="form-wrapper">
            <header>Login </header>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email Address" type="email" name="email" autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                </div>
            </div>

            <div class="form-group mb-0 mt-4">
                <button class="btn btn-default text-capitalize">Log in</button>
            </div>

        </div>
    </form>
</main>

@include('partials.footer')
@endsection
