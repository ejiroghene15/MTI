@extends('layout.master')
@section('title', 'Reset Password')
@section('body')
@include('partials.nav')

<main id="login_page">

    <section class="px-3">
        <form action="{{ route('change_password', ['token'=> $token]) }}" method="post">
            @csrf
            @if (session('message'))
            <x-alert :type="session('type')" :message="session('message') " />
            @endif
            <div class="form-wrapper">
                <header>Reset Password </header>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Enter new password" type="password" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Confirm your new password" type="password"
                            name="confirm_password">
                    </div>
                </div>

                <div class="form-group mb-0 mt-4">
                    <button class="btn btn-default text-capitalize">Reset Password</button>
                </div>

            </div>
        </form>
    </section>

</main>

@include('partials.footer')
@endsection
