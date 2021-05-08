@extends('layout.master')
@section('title', "Event - $upcoming->name" )
@section('body')

@include('partials.nav')

<main id="course_page">

    <section class="banner">
        <img src="{{ $upcoming->image ?? asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg') }}"
            alt="">
    </section>

    <div class="container-fluid">

        <section class="about_course">
            <p class="course_title">{{ $upcoming->name }}</p>
            <small class="excerpt">{{ $upcoming->excerpt }}</small>

            <article>
                <article>
                    <article class="mb-4 excerpt">
                        <label for="">Prospects</label>
                        <article>
                            {{ $upcoming->description }}
                        </article>
                    </article>

                </article>

                <aside>
                    <label for="" class="mb-3">Course Faculty</label>
                    <div class="tutor_info">
                        <img src="{{ asset($upcoming->tutor->picture) }}" alt="">
                        <p class="text-center p-2">
                            <span
                                class="name">{{ $upcoming->tutor->first_name . ' ' .$upcoming->tutor->last_name }}</span>
                            {{-- <span class="role">{{ }}</span> --}}
                        </p>
                    </div>
                </aside>

            </article>
        </section>
    </div>

</main>

@include('partials.footer')

@endsection
