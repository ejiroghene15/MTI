@extends('layout.master')
@section('body')

@include('partials.nav')

<main id="homepage">
    <section class="hero_section">
        <section class="section_intro">
            <h2 class="main_text">Become a Professional</h2>
            <h4 class="text-light sub_text">
                Learn soft and hard skills from any location in the world. <br> With access to over 100 tutors, we help
                students achieve mastery of highly sought-after skills.
            </h4>
            @auth
            <a href="{{ route('courses') }}" class="btn btn-default text-capitalize mb-5">Browse Courses</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-default text-capitalize mb-5">Join Academy For Free</a>
            @endauth
        </section>
        <section id="scroll-down" class="d-none">
            <a href="#tutors" id="scrd" class="bouncing_arrow"><i class="fa fa-chevron-down"></i> </a>
        </section>
    </section>

    <div class="container-fluid my-5 sections">
        <div class="card-body">
            @if ($class)
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-pill mb-3 pri-color-alt pt-2 d-inline-block">Upcoming Class</span>
                    <h3 class="display-3 mb-0">{{ $class->name }}</h3>
                    <p class="lead ">
                        {!! nl2br($class->excerpt) !!}
                    </p>
                    <a href="{{ route('class',  $class->link_id) }}" class="btn btn-default mb-5">View Course
                        Details</a>
                </div>
            </div>
            @endif

            <div class="row align-items-stretch">
                <div class="col-md-4 mb-5 ">
                    <div class="card-body shadow-sm rounded">
                        <a href="{{ route('courses') }}" class="info text-center d-block">
                            <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                <i class="fa fa-book"></i>
                            </div>
                            <h6 class="info-title text-uppercase text-primary">Our courses</h6>
                            <p class="description opacity-8">
                                Discover a world of skills and opportunities from tutors and experts
                            </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card-body shadow-sm rounded">
                        <div class="info text-center">
                            <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                <i class="fa fa-users"></i>
                            </div>
                            <h6 class="info-title text-uppercase text-success">Students' Hangout</h6>
                            <p class="description opacity-8">
                                Enjoy free weekend discussions from professionals in different sectors
                            </p>
                            <a href="javascript:;" class="text-primary d-none">
                                <i class="ni ni-bold-right text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card-body shadow-sm rounded">
                        <div class="info text-center">
                            <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                <i class="fa fa-building"></i>
                            </div>
                            <h6 class="info-title text-uppercase text-warning">Our Marketplace</h6>
                            <p class="description opacity-8">
                                Sell your skills, provide opportunities and get paid for
                                all your troubles.
                            </p>
                            <a href="javascript:;" class="text-primary d-none">
                                <i class="ni ni-bold-right text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section for="tutors" class="tutors_section my-5" id="tutors">
        <div class="bg-default">
            <article class="card-body ">
                <h3 class="text-center font-weight-bold label"> Our Tutors</h3>
                <div class="wrapper">
                    <div class="tutor_info">
                        <img
                            src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619188235/tutors/chidinma.jpg') }}" />
                        <p class="text-center name">
                            <span>Chidinma Egwuogu</span>
                            <span class="role">Copywriting/content creation</span>
                        </p>
                    </div>
                    <div class="tutor_info">
                        <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619178900/tutors/gabriel_olisa.jpg') }}"
                            alt="">
                        <p class="text-center name">
                            <span>Onyebuolise Gabriel</span>
                            <span class="role">Graphic Design</span>
                        </p>
                    </div>
                    <div class="tutor_info">
                        <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619178901/tutors/alexander_osagie.jpg') }}"
                            alt="">
                        <p class="text-center name">
                            <span>Osagie Alexander</span>
                            <span class="role">Video creation and 3D Animation</span>
                        </p>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a href="{{route('tutors')}}" class="btn btn-outline-light text-capitalize px-5 py-3 ">See all
                        Tutors</a>
                </div>
            </article>
        </div>
    </section>

    <div class="container-fluid my-5 sections">
        <section for="blog-posts" class="card-body my-5">
            <h4 class="text-default font-weight-bold mb-4">Blog Posts</h4>

            <div class="blog mb-3">
                @foreach ($blogposts as $post)
                <article class="blog-post">
                    <a class="excerpt" href="{{ $post->guid }}" target="_blank">
                        <div class="thumbnail">
                            <img src="{{ $attachment->where('post_parent', $post->ID)->first()->guid }}"
                                class="card-img-top">
                        </div>
                        <div class="info py-0">
                            <h6 class="title mb-0">
                                <span class="text-capitalize">
                                    {{ Str::title(Str::words($post->post_title, 5, '...')) }}
                                </span>
                            </h6>
                            <div class="short-text">
                                {!! Str::words($post->post_content, 13, '...') !!}
                            </div>
                            <small class="mt-auto mb-3 btn btn-sm btn-default text-capitalize"> Read Article</small>
                        </div>
                    </a>
                </article>
                @endforeach

                <article class="blog-post d-none">
                    <a class="excerpt"
                        href="https://nairametrics.com/2020/08/17/10-ways-to-save-and-make-more-investments/">
                        <div class="thumbnail"><img
                                src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618859759/events/savers_or_borrowers.jpg') }}"
                                class="card-img-top" alt="..."></div>
                        <div class="info">
                            <h6 class="title">
                                <span>10 ways to save and make more investments </span>
                                <small class="d-none"> Gabriel Pexel</small>
                            </h6>
                        </div>
                    </a>
                </article>

                <article class="blog-post d-none">
                    <a class="excerpt">
                        <div class="thumbnail">
                            <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618859758/events/fintechs_n_banks.jpg') }}"
                                class="card-img-top" alt="..."></div>
                        <div class="info">
                            <h6 class="title">
                                <span>How Tech Giants Make Their Billions</span>
                                <small class="d-none"> Cecil Palms</small>
                            </h6>
                        </div>
                    </a>
                </article>

                <article class="blog-post d-none">
                    <a class="excerpt">
                        <div class="thumbnail"><img
                                src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618726423/mti_primary_img.jpg') }}"
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

            <a href="#" class="btn btn-default text-capitalize px-5 py-3  d-none">See all</a>
        </section>
    </div>

</main>

@include('partials.footer')

@endsection
