@php
$settings_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "$user->first_name | Settings")

@section('content')
<div class="content settings">
    <section for="alert">
        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif
    </section>

    <header class="content-header">
        <p>Settings</p>
    </header>

    <nav class="nav-wrapper position-relative" style="z-index: 0;">
        <ul class="nav nav-pills nav-fill d-flex flex-column flex-md-row" style="box-shadow: none" role="tablist">
            <li class="mr-3">
                <a class="nav-link mb-sm-3 mb-md-0 active px-4" data-toggle="tab" href="#posts" role="tab"
                    aria-selected="true">
                    <img src="{{ asset('images/icons/article.png') }}" class="mr-2" alt="" height="20" width="20">
                    Posts
                </a>
            </li>
            <li class="mr-2">
                <a class="nav-link mb-sm-3 mb-md-0 px-4" data-toggle="tab" href="#courses" role="tab"
                    aria-selected="true">
                    <img src="{{ asset('images/icons/books.png') }}" class="mr-2" alt="" height="20" width="20">
                    Courses
                </a>
            </li>
        </ul>
    </nav>

    <section class="tab-content mt-2">
        <div class="tab-pane fade show active" id="posts" role="tabpanel">
            @include('profile.settings.posts')
        </div>
        <div class="tab-pane fade" id="courses" role="tabpanel">
            @include('profile.settings.courses')
        </div>
    </section>

    @endsection

    @section('scripts')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
    </script>
    <script>
        $('.dt').DataTable();
    </script>
    @endsection
