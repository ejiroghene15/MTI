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
                <a href="#">
                    <span class="material-icons">
                        dashboard
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}">
                    <span class="material-icons">
                        article
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons">
                        person
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons">
                        settings
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ url('logout') }}">
                    <span class="material-icons">
                        power_settings_new
                    </span>
                </a>
            </li>

        </ul>
    </aside>
    @yield('content')
</main>

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
