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
                <article class="mb-5 excerpt">
                    <label for="">Bio</label>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim sint
                        neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                        consequuntur hic eveniet.
                    </article>
                </article>

                <article class="mb-5 excerpt">
                    <label for="">Education</label>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim sint
                        neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                        consequuntur hic eveniet.
                    </article>
                </article>

                <article class="mb-5 excerpt">
                    <label for="">Area Of Specialization</label>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim sint
                        neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                        consequuntur hic eveniet.
                    </article>
                </article>

            </article>

            <aside>
                <label for="" class="mb-3">Team Members</label>
                <article class="tutor_info mb-5">
                    <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                    <p class="m-0 text-light">
                        <span class="name">Kohwo Akpofure</span>
                        <span class="role">Founder</span>
                    </p>
                </article>

                <article class="tutor_info mb-5">
                    <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                    <p class="m-0 text-light">
                        <span class="name">Ink Yonko</span>
                        <span class="role">Co-Founder</span>
                    </p>
                </article>

            </aside>
        </section>
    </div>
</main>

@include('partials.footer')

@endsection
