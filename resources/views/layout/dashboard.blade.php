@extends('layout.master')
@section('title')
@yield('title')
@endsection

{{-- styles section --}}
@section('styles')
@parent
<link rel="stylesheet" href="/css/dropify.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.css" />

<link rel="stylesheet" href="/css/dashboard.css">
@endsection
{{-- end styles section --}}

{{-- body section --}}
@section('body')

{{-- nav section --}}
<nav class="nav">
    <a href="/" class="nav-icon">
        <img
            src="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1620388815/mticropped_njt47v.png" />
    </a>
    <span class="float-right">
        @auth
        <img alt="Profile pixture" src="{{ auth()->user()->picture }}" height="50" width="50" style="object-fit: cover"
            class="rounded-circle" />
        @else
        <li class="nav-item">
            <a class="nav-link pb-0" style="transform: translateY(40%); font-size: 16px; font-weight: 600" href="{{ url('login') }}">
                <span>Login</span>
            </a>
        </li>
        @endauth
    </span>
</nav>

<main>
    {{-- sidebar navigation --}}
    @include('layout.sidebar')
    {{-- main content --}}
    @yield('content')
</main>

{{-- bottom nav --}}
<nav id="bottom-nav">
    <a href="/dashboard" class="nav-menu d-none">
        <span class="material-icons">
            dashboard
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/dashboard.png') }}" alt="">
        </span>
        <p>Dashboard</p>
    </a>

    <a href="{{ route('articles.index') }}" class="nav-menu">
        <span class="material-icons">
            article
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/article.png') }}" alt="">
        </span>
        <p>Articles</p>
    </a>

    <a href="{{ route('articles.create') }}" class="nav-menu">
        <span class="material-icons">
            create
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/writing.png') }}" alt="">
        </span>
        <p>New Post</p>
    </a>

    @auth
    <a href="{{ route('my_profile') }}" class="nav-menu">
        <span class="material-icons">
            person
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/user.svg') }}" alt="">
        </span>
        <p>Profile</p>
    </a>

    <a href="{{ route('settings') }}" class="nav-menu">
        <span class="material-icons">
            settings
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/individual.png') }}" alt="">
        </span>
        <p>Settings</p>
    </a>

    <a href="{{ url('logout') }}" class="nav-menu">
        <span class="material-icons">
            power_settings_new
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/logout.svg') }}" alt="">
        </span>
        <p>Log out</p>
    </a>
    @endauth

</nav>

{{-- footer section --}}
<footer class="footer">
    <span class="text-center">&COPY; {{ date('Y') }} {{ env('APP_NAME') }}. </span>
</footer>

@endsection

@section('js')
@parent
<script src="/js/plugins/dropify.min.js"></script>
<script src="/js/plugins/ckeditor.js"></script>
<script type="text/javascript" @yield('scripts') @endsection
