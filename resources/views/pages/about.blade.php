@extends('layout.master')
@section('title', "About Us")
@section('body')

@include('partials.nav')

<main id="about_page">
    <article class="banner">
        <div class="label">
            <p class="big-text">About Us </p>
        </div>
    </article>

    <section class="excerpt">
        <p>
            <strong style="font-size: 1.2em">Midas Touch Academy</strong> was formed against backdrop of empowering students with skills and the ability to
            readily leverage opportunities. We realized that the 21st century youth, must move beyond mere degrees
            and certificate because the 21st century market only respects those who can add value not those who
            "claim" they can add value. Against this backdrop and purpose, we have created a platform where skills
            and opportunities are transferred to the next generation of entrepreneurs and skilled employees. The
            focus is on highly-sought after skills, taught only by tutors of the highest standard.
        </p>
        <p>We emphasize
            <strong>quality, expertise, integrity, creativity and uniqueness.</strong></p>
        <p>
            Today, we have available a wide range of courses as well as great tutors to teach them. We are a
            platform, a learning environment and a trade place where skills are exchanged, information shared, value
            added and wealth created
        </p>
    </section>
</main>

@include('partials.footer')

@endsection
