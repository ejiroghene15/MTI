@extends('layout.master')
@section('title', "Tutors")
@section('body')

@include('partials.nav')

<main id="tutors_page">

    <article>
        <h3>Our Tutors</h3>
        <article class="excerpt">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro consectetur ipsam,
            necessitatibus, excepturi repellendus perferendis quo adipisci praesentium quasi optio nulla velit
            temporibus dolorem quidem amet, aliquid molestiae ullam delectus suscipit iste ipsum officiis dolores!
            Explicabo, aspernatur. Commodi sequi eos, culpa corrupti ab soluta hic dicta id nulla harum, voluptates
            consectetur ipsam? Nesciunt laborum quo earum, maxime rem fuga nulla odio quis, sed placeat officia deleniti
            architecto dolorum, illum corrupti dolores dolore exercitationem cupiditate totam optio nisi? Minus,
            incidunt. Consectetur laborum dolor pariatur rem illum rerum cupiditate reprehenderit voluptatem debitis
            optio, blanditiis dolores quibusdam voluptates illo, fugiat nesciunt velit mollitia?
        </article>
        <section class="tutor_images">
            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                    <div class="card_label">
                        <span class="name">Shanks Akagami</span>
                        <span class="role">Web Developer</span>
                    </div>
                </div>
            </article>

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                    <div class="card_label">
                        <span class="name">Lisa Kudrow</span>
                        <span class="role">Makeup Artist</span>
                    </div>
                </div>
            </article>

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                    <div class="card_label">
                        <span class="name">Dozie Money</span>
                        <span class="role">Forex Expert</span>
                    </div>
                </div>
            </article>

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                    <div class="card_label">
                        <span class="name">Olisa Gabriel</span>
                        <span class="role">Graphic Designer</span>
                    </div>
                </div>
            </article>

        </section>
    </article>

</main>

@include('partials.footer')

@endsection
