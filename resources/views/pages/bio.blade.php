@extends('layout.master')
@section('title', "Bio")
@section('body')

@include('partials.nav')
<main id="bio">
    <section class="bg">
        <div>
            <p>Ejiroghene Obiuwevbi <br>
                <small>Co-Founder</small>
            </p>
            <img src="{{ asset('images/stock-market.jpg') }}" alt="">
        </div>
    </section>
    <div class="container-fluid">
        <section class="bio_info">
            <article>
                <article class=" excerpt">
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