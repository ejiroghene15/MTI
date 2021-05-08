@extends('layout.master')
@section('title', "Bio")
@section('body')

@include('partials.nav')
<main id="bio">
    <section class="bg">
        <div>
            <p>Shanks Akagbami <br>
                <small>Web Developer</small>
            </p>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
        </div>
    </section>
    <div class="container-fluid">
        <section class="bio_info">
            <article>
                <article class="mb-5 excerpt">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim sint
                        neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                        consequuntur hic eveniet.
                </article>

            </article>

        </section>
    </div>
</main>

@include('partials.footer')

@endsection
