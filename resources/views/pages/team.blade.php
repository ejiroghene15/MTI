@extends('layout.master')
@section('title', "Our Team")
@section('body')

@include('partials.nav')

<main id="our_team">
    <article class="banner">
        <div class="label">
            <p class="big-text">Meet the team </p>
            <span>
                With diverse experience in the labour market and in the finance world, <br> these are the minds behind
                Midas
                Touch Academy
            </span>
        </div>
    </article>

    <section class="profiles">

        <article class="tt_card">
            <div class="tt_card_img">
                <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619196865/mti_team/akpos.jpg') }}"
                    alt="">
                <div class="card_label">
                    <span class="name">Akpofure Kohwo</span>
                    <span class="role">Chief Executive Officer</span>
                </div>
            </div>
        </article>

        <article class="tt_card">
            <div class="tt_card_img">
                <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619196097/mti_team/kelvin.jpg') }}"
                    alt="">
                <div class="card_label">
                    <span class="name">Kelvin Isibor</span>
                    <span class="role">Chief Operating Officer</span>
                </div>
            </div>
        </article>

        <article class="tt_card">
            <div class="tt_card_img">
                <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619196940/mti_team/malcolm.png') }}"
                    alt="">
                <div class="card_label">
                    <span class="name">Ejiroghene Obiuwevbi</span>
                    <span class="role">Chief Technology Officer</span>
                </div>
            </div>
        </article>

        <article class="tt_card">
            <div class="tt_card_img">
                <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619196097/mti_team/uche.jpg') }}"
                    alt="">
                <div class="card_label">
                    <span class="name">Uche Ogala</span>
                    <span class="role">Chief Commercial Officer</span>
                </div>
            </div>
        </article>

        {{-- <article class="tt_card d-none">
            <div class="tt_card_img">
                <img src="{{ asset('https://res.cloudinary.com/jiroghene/image/upload/v1583814631/profilephotos/placeholder_afglhp.jpg') }}"
                    alt="">
                <div class="card_label">
                    <span class="name">Chioma Uzochukwu</span>
                    <span class="role">Chief Marketing Officer</span>
                </div>
            </div>
        </article> --}}

    </section>
</main>

@include('partials.footer')

@endsection