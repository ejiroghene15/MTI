@extends('layout.master')
@section('title')
@yield('title')
@endsection

{{-- styles section --}}
@section('styles')
@parent
<link rel="stylesheet" href="/css/dropify.min.css">
<link rel="stylesheet" href="/css/dashboard.css">
@endsection
{{-- end styles section --}}

{{-- body section --}}
@section('body')

{{-- nav section --}}
<nav class="nav">
    <a href="#" class="nav-icon">
        <img
            src="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1620388815/mticropped_njt47v.png" />
    </a>
    <span class="float-right">
        <img alt="Profile pixture" src="{{ auth()->user()->picture }}" height="50" width="50" style="object-fit: cover"
            class="rounded-circle" />
    </span>
</nav>

<main>
    {{-- sidebar navigation --}}
    <aside class="sidebar sidebar-left">
        <ul>
            <li>
                <a href="/dashboard" class="{{ @$index_active }}">
                    <span class="material-icons">
                        dashboard
                    </span>
                    <span class="icon">
                        <img src="{{ asset('images/icons/dashboard.png') }}" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}" class="{{ @$articles_active }}">
                    <span class="material-icons">
                        article
                    </span>
                    <span class="icon">
                        <img src="{{ asset('images/icons/article.png') }}" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ @$profile_active }}">
                    <span class="material-icons">
                        person
                    </span>
                    <span class="icon">
                        <img src="{{ asset('images/icons/user.png') }}" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ @$settings_active }}">
                    <span class="material-icons">
                        settings
                    </span>
                    <span class="icon">
                        <img src="{{ asset('images/icons/individual.png') }}" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ url('logout') }}">
                    <span class="material-icons" style="display: block">
                        power_settings_new
                    </span>
                </a>
            </li>

        </ul>
    </aside>
    @yield('content')
</main>

{{-- bottom nav --}}
<nav id="bottom-nav">
    <a href="/dashboard" class="nav-menu">
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

    <a href="#" class="nav-menu">
        <span class="material-icons">
            person
        </span>
        <span class="icon">
            <img src="{{ asset('images/icons/user.svg') }}" alt="">
        </span>
        <p>Profile</p>
    </a>

    <a href="#" class="nav-menu">
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
@yield('scripts')
@endsection
