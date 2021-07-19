@php
$index_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "Dashboard | $user->first_name")

@section('content')
<article class="content">
    <header class="content-header">
        <p>{{ date('l d, F', time()); }}</p>
    </header>

    <div class="content-body">
        <section class="event">
            <article class="event-img">
                <img src="{{ asset('images/animation.jpg') }}" alt="">
            </article>
            <article class="event-caption">
                <h6 class="coming-soon">Coming Soon!!</h6>
                <p>Market Place</p>
                <p class="small-text">Get value for your money by leveraging on the services of skilled individuals.
                </p>
                <a href="#" class="mt-4 btn btn-default">Visit Market</a>
            </article>
        </section>
        <aside class="sidebar">
            <header>
                Articles
            </header>
        </aside>
    </div>
</article>

@endsection
