@extends('layout.master')
@section('title', "Course Information")
@section('body')

@include('partials.nav')

<main id="course_page">

    <section class="banner">
        <img src="{{ asset('images/stock-market.jpg') }}" alt="">
    </section>

    <div class="container-fluid">

        <section class="about_course">
            <p class="course_title">Stock Market</p>

            <article>
                <article>
                    <article class="mb-4 excerpt">
                        <label for="">About Stock Trading</label>
                        <article>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim
                            sint
                            neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                            consequuntur hic eveniet.
                        </article>
                    </article>

                    <article class="mb-4 excerpt">
                        <label for="">Prospects</label>
                        <article>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim
                            sint
                            neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                            consequuntur hic eveniet.
                        </article>
                    </article>

                    <article class="mb-4 excerpt">
                        <label for="">Area of course concentration</label>
                        <article>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, obcaecati. Magnam enim
                            sint
                            neque quisquam ipsum possimus rerum. Quod, quidem odio. Atque quidem, fugit minus sit ea
                            consequuntur hic eveniet.
                        </article>
                    </article>

                    <article class="mb-4 excerpt">
                        <label for="">Get a certification</label>
                        <article>
                            <p>
                                Interested in this course? Register to get started or login with your account, to
                                proceed to
                                make payment to unlock this course.
                            </p>

                        </article>
                    </article>


                </article>

                <aside>
                    <label for="" class="mb-3">Course Faculty</label>
                    <div class="tutor_info">
                        <img src="{{ asset('images/stock-market.jpg') }}" alt="">
                        <p class="text-center p-2">
                            <span class="name">Ada Billions</span>
                            <span class="role">Stock Broker Expert</span>
                        </p>
                    </div>
                </aside>
            </article>
        </section>
    </div>

</main>

@include('partials.footer')

@endsection
