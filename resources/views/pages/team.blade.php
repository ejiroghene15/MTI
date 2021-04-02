@extends('layout.master')
@section('title', "Our Team")
@section('body')

@include('partials.nav')

<main id="our_team">
    <section class="grids">
        <article>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
            <div class="bg-default text-center">
                <span class="name">INK Yonko</span>
                <span class="role">Co-Founder</span>
            </div>
        </article>
        <article>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
            <div class="bg-default text-center">
                <span class="name">Kohwo Akpofure </span>
                <span class="role">Founder</span>
            </div>
        </article>
        <article>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
            <div class="bg-default text-center">
                <span class="name">Ejiroghene</span>
                <span class="role">Co-Founder</span>
            </div>
        </article>
        <article>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
            <div class="bg-default text-center">
                <span class="name">Uche Ego</span>
                <span class="role">Co-Founder</span>
            </div>
        </article>
        <article>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
            <div class="bg-default text-center">
                <span class="name">Chioma Money</span>
                <span class="role">Co-Founder</span>
            </div>
        </article>

    </section>
</main>

@include('partials.footer')

@endsection
