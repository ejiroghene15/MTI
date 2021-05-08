@extends('layout.master')
@section('title', "Tutors")
@section('body')

@include('partials.nav')

<main id="tutors_page">
    <article class="banner">
        <div class="label">
            <p class="big-text">Our Tutors </p>
        </div>
    </article>

    <article>
        <h3>The Selection Process</h3>
        <article class="excerpt">
            In order to stay true to our goal of providing only the best quality of lessons available, we seek out only
            astute professional teachers who have a wealth of knowledge and experience under their belt. The selection
            process is rigorous as well as thorough. We invite applications from dozens of applicants, review their
            qualifications, second check their achievements, reach out to referees as well as old students, old
            employees and employers. We shortlist and then invite the shortlisted candidates for interviews. We give the
            tutors tasks to perform including a simulation scenario. The tutor then prepares materials, which we vet and
            approve. It's only after our final approval, the tutor may then have his/her first class with our students.
            Still, we are present in every class and watch how the lectures are delivered and monitor the feedback
            given. <br>
            Of course sometimes we skip all these process and apply ourselves to professional tutors whose track record
            of excellence already speak for itself, we negotiate terms and conditions with them, we still interview them
            before allowing them to teach.
        </article>
        <h3 class="mt-5">Meet Our Tutors</h3>
        <section class="tutor_images">

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619188235/tutors/chidinma.jpg') }}"
                        alt="">
                    <div class="card_label">
                        <span class="name">Chidinma Egwuogu</span>
                        <span class="role">Copywriting/content creation</span>
                    </div>
                </div>
            </article>

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619178900/tutors/gabriel_olisa.jpg') }}"
                        alt="">
                    <div class="card_label">
                        <span class="name">Olisa Gabriel</span>
                        <span class="role">Graphic Design</span>
                    </div>
                </div>
            </article>

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619178901/tutors/alexander_osagie.jpg') }}"
                        alt="">
                    <div class="card_label">
                        <span class="name">Osagie Alexander</span>
                        <span class="role">Video creation and 3D Animation</span>
                    </div>
                </div>
            </article>

            <article class="tt_card">
                <div class="tt_card_img">
                    <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619188235/tutors/chigbogu.jpg') }}"
                        alt="">
                    <div class="card_label">
                        <span class="name">Chigbogu Ezeilo</span>
                        <span class="role">Forex Trading</span>
                    </div>
                </div>
            </article>

        </section>
    </article>

</main>

@include('partials.footer')

@endsection