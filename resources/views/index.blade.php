@extends('layout.master')
@section('body')

@include('partials.nav')

<main id="homepage">
    <section class="hero_section">
        <section class="section_intro">
            <h2 class="main_text"> Midas Touch Academy</h2>
            <h4 class="text-light sub_text">An online platform for remote learning, skill acquisition and
                outsourcing.. </h4>
            <a href="{{ route('register') }}" class="btn btn-default ">Join Academy</a>
        </section>
        <section id="scroll-down">
            <a href="" class="bouncing_arrow"><i class="fa fa-chevron-down"></i> </a>
        </section>
    </section>

    <div class="container-fluid">
        <section for="blog-posts" class="card-body my-5">
            <h4 class="text-dark font-weight-bold">Blog Posts</h4>

            <div class="blog mb-3">

                <article class="blog-post">
                    <a class="excerpt">
                        <div class="thumbnail"><img src="{{ asset('/images/alejandro-escamilla.jpg') }}"
                                class="card-img-top" alt="..."></div>
                        <div class="info">
                            <h6 class="title">
                                <span>Learn the rudiments of Fashion Design</span>
                                <small> Shade's Attires</small>
                            </h6>
                        </div>
                    </a>
                </article>

                <article class="blog-post">
                    <a class="excerpt">
                        <div class="thumbnail"><img src="{{ asset('/images/alejandro-escamilla.jpg') }}"
                                class="card-img-top" alt="..."></div>
                        <div class="info">
                            <h6 class="title">
                                <span>Collaborating with various designers</span>
                                <small> Gabriel Pexel</small>
                            </h6>
                        </div>
                    </a>
                </article>

                <article class="blog-post">
                    <a class="excerpt">
                        <div class="thumbnail"><img src="{{ asset('/images/alejandro-escamilla.jpg') }}"
                                class="card-img-top" alt="..."></div>
                        <div class="info">
                            <h6 class="title">
                                <span>How ointments made me millions</span>
                                <small> Cecil Palms</small>
                            </h6>
                        </div>
                    </a>
                </article>

                <article class="blog-post">
                    <a class="excerpt">
                        <div class="thumbnail"><img src="{{ asset('/images/alejandro-escamilla.jpg') }}"
                                class="card-img-top" alt="..."></div>
                        <div class="info">
                            <h6 class="title">
                                <span>Learning brand identity design</span>
                                <small> Ink Yonko</small>
                            </h6>
                        </div>
                    </a>
                </article>

            </div>

            <a href="#" class="btn btn-default text-capitalize px-5 py-3 ">See all</a>
        </section>
    </div>

    <section for="tutors" class="tutors_section mb-5">
        <div class="bg-default">
            <article class="card-body ">
                <h3 class="text-center font-weight-bold label"> Our Tutors</h3>
                <div class="wrapper">
                    <div class="tutor_info">
                        <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" alt="">
                        <p class="text-center name">
                            <span>Gabriel Onyebuolise</span>
                            <span class="role">Graphics Design Tutor</span>
                        </p>
                    </div>
                    <div class="tutor_info">
                        <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" alt="">
                        <p class="text-center name">
                            <span>Shanks Akagami</span>
                            <span class="role">Web Design Tutor</span>
                        </p>
                    </div>
                    <div class="tutor_info">
                        <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" alt="">
                        <p class="text-center name">
                            <span>Gol D. Roger</span>
                            <span class="role">Animation Tutor</span>
                        </p>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a href="#" class="btn btn-outline-light text-capitalize px-5 py-3 ">See all Tutors</a>
                </div>
            </article>
        </div>
    </section>

    <section for="upcoming-events" class=" upcoming_events mb-5">
        <div class="card-body">
            <h3 class="text-center text-dark font-weight-bold">Upcoming Events</h3>
            <div class="event_listing">
                <article>
                    <section class="event_detail">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="event_title">Graphics Design <br> Master Class</h5>
                            <p class="event_date">Monday, February 28th</p>
                        </div>
                    </section>
                    <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" class="event_img" alt="...">
                </article>

                <article>
                    <section class="event_detail">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="event_title">Zoom <br> Hangout</h5>
                        </div>
                    </section>
                    <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" class="event_img" alt="...">
                </article>

                <article>
                    <section class="event_detail">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="event_title">CH <br> Hangout</h5>
                        </div>
                    </section>
                    <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" class="event_img" alt="...">
                </article>

                <article>
                    <section class="event_detail">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="event_title">Basics of Forex <br> Trading</h5>
                            <p class="event_date">Monday, March 30th</p>
                        </div>
                    </section>
                    <img src="{{ asset('/images/alejandro-escamilla.jpg') }}" class="event_img" alt="...">
                </article>
            </div>
        </div>
    </section>
</main>

@include('partials.footer')

@endsection
