@extends('layout.master')
@section('title', "Course - $course->course_title" )
@section('body')

@include('partials.nav')

<main id="course_page">

    <section class="banner">
        <img src="{{ $course->image ?? asset('images/stock-market.jpg') }}" alt="">
    </section>

    <div class="container-fluid">

        <section class="about_course">
            <p class="course_title">{{ $course->course_title }}</p>
            <small class="excerpt">{{ $course->excerpt }}</small>

            <article>
                <article>
                    <article class="mb-4 excerpt">
                        <label for="">Prospects</label>
                        <article>
                            {{ $course->course_description }}
                        </article>
                    </article>

                </article>

                @if ($course->tutor)
                <aside>
                    <label for="" class="mb-3 d-none">Course Faculty</label>
                    <div class="tutor_info mt-3">
                        <section class="background">
                            <section class="cover"></section>
                        </section>
                        <p class="text-center p-2">
                            <img src="{{ asset($course->tutor->picture) }}" alt="">
                            <span class="name">{{ $course->tutor->first_name . ' ' .$course->tutor->last_name }}</span>
                            <span class="role"> Instructor</span>
                        </p>
                    </div>
                </aside>
                @endif

            </article>
        </section>

        <div id="more_courses">
            <header>Other Courses</header>
            <section>
                @foreach ($more as $course)
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
            <a href="{{ route('courses') }}" class="btn btn-default mt-5">All Courses</a>

        </div>

    </div>


</main>

@include('partials.footer')

@endsection