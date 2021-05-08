@extends('layout.master')
@section('title', "Courses")
@section('body')

@include('partials.nav')

<main id="courses_all">
    <section class="banner">
        <img src="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1620311825/courses_bg.jpg"
            alt="">
        <p>Courses Catalog</p>
        <p class="small">Browse through our available courses</p>
    </section>

    <section id="courses">
        @foreach ($courses as $course)

        <article>
            <a href="{{ route('course_info', $course->slug) }}">
                <header>{{ $course->course_title }}</header>
                <div class="image">
                    <img src="{{ $course->image }}" alt="">
                </div>
                @if ($course->tutor)

                <footer>
                    <span class="avatar avatar-lg rounded-circle">
                        <img src="{{ $course->tutor->picture }}" alt=""></span>
                    <span>
                        <span class="tutor">
                            {{ $course->tutor->first_name . " " . $course->tutor->last_name }}
                        </span>
                        <span class="role">
                            Instructor
                        </span>
                    </span>
                </footer>

                @endif

            </a>
        </article>

        @endforeach

    </section>

</main>

@include('partials.footer')

@endsection
