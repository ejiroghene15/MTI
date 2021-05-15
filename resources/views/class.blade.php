@extends('layout.master')
@section('title', "Class - $class->name" )
@section('body')

@include('partials.nav')

<main id="course_page">

    <section class="banner">
        <img src="{{ $class->image ?? asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg') }}"
            alt="">
    </section>

    <div class="container-fluid">

        <section class="about_course">
            <p class="course_title">{{ $class->name }}</p>
            <small class="excerpt">{{ $class->excerpt }}</small>

            <article>
                <article>
                    {{-- alert message from session --}}
                    @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message') " />
                    @endif

                    <article class="mb-4 excerpt">
                        <label for="">About the Class</label>
                        <article>
                            {{ $class->description }}
                        </article>

                        <p>
                            <a href="{{ $class->course_outline }}" class="outline btn shadow-sm text-capitalize mt-3"
                                target="_blank">
                                <strong>See
                                    Course Outline</strong></a>

                            <span class="price btn btn-info text-capitalize d-inline-block mt-3"><strong>Class Price:
                                    ₦{{ $class->price  }}</strong>
                            </span>
                        </p>

                        <p>
                            <small class="heading text-capitalize">Class duration:
                                {{ date('jS\ F ', strtotime($class->start)) }} -
                                {{ date('jS\ F Y', strtotime($class->end)) }}</small>
                        </p>

                        {{-- if the registration has ended,  display a message telling the user that registration has ended --}}
                        @if (time() > strtotime($class->end_registration))
                        <label class="text-warning">Registration for this class has ended</label>
                        @else
                        @guest
                        <p class="text-warning" style="font-weight: 600">Registration ends
                            {{ date('jS\ F, Y', strtotime($class->end_registration)) }}</p>
                        <article>
                            <strong>
                                Lectures would be held live via a zoom class. To participate in the lectures, after
                                payment has been made and confirmed, the link to the live zoom class will be sent to
                                your email address.
                            </strong>
                        </article>
                        @endguest

                        @auth
                        {{-- opening auth --}}
                        @if ( $class->payments->where('user', auth()->user()->email)->where('payment_status',
                        1)->where('event_link_id', $class->link_id)->first())
                        {{-- if a user has made payment for the course.. display the message below --}}
                        <label for="" class="my-2 text-success">Registration Successful</label>
                        <p>
                            <strong style="font-weight: 600; font-size: 14px">
                                The zoom link invite for this class would be sent to
                                your email. You can also find it in your dashboard, under <q>Courses Registered</q>
                                menu. For further enquires, send us a mail at
                                <a href="mailto:support@midastouchacademy.com">support@midastouchacademy.com</a>.
                            </strong>
                        </p>
                        @else
                        @if (boolval(auth()->user()->email_verified))
                        {{-- if the user is a verified user that's yet to make payment, display payment button below --}}
                        <p class="text-warning" style="font-weight: 600">Registration ends
                            {{ date('jS\ F, Y', strtotime($class->end_registration)) }}</p>
                        <article>
                            <strong>
                                Lectures would be held live via a zoom class. To participate in the lectures, after
                                payment has been made and confirmed, the link to the live zoom class will be sent to
                                your email address.
                            </strong>
                        </article>
                        <a href="{{ route('make_payment',  $class->link_id) }}" class="btn btn-success mt-3">
                            Proceed with payment
                        </a>
                        @else
                        {{-- if the user hasn't verified their account, display a button below that sends a verification mail --}}
                        <p class="mt-3">
                            <strong style="font-weight: 600; font-size: 14px">
                                You haven't verified your email.
                                Your email has to be verified before
                                you can register for a class. Click on the button below to resend verification link
                                to
                                your mail.
                            </strong>
                        </p>
                        <form action="{{ route('reverify') }}" method="post">
                            @csrf
                            <button class="btn btn-dark">Send Verification Mail</button>
                        </form>
                        @endif
                        @endif
                        @else
                        <p class="mt-3"><strong>N:B: You need to be logged in to register for this class.</strong>
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-default">Login</a>
                        {{-- closing auth --}}
                        @endauth

                        @endif

                    </article>

                </article>

                <aside>
                    <label for="" class="mb-3 d-none">Course Faculty</label>
                    <div class="tutor_info mt-3">
                        <section class="background">
                            <section class="cover"></section>
                        </section>
                        <p class="text-center p-2">
                            <img src="{{ asset($class->tutor->picture) }}" alt="">
                            <span class="name">{{ $class->tutor->first_name . ' ' .$class->tutor->last_name }}</span>
                            <span class="role">Course Instructor</span>
                        </p>
                    </div>
                </aside>

            </article>
        </section>
    </div>

</main>

@include('partials.footer')

@endsection

@section('js')
@parent
@if (session('status') == "payment_initiated")
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    let pub_key = 'FLWPUBK-5397ce0803ab214a63840074cf34330f-X';
    let tx_ref = "{{ session('token') }}";
    let amount = "{{ str_replace(',', '', $class->price) }}";
    let currency = "NGN";
    let redirect_url = "{{ route('confirm_payment') }}";
    let payment_option = "card";
    let customer_name = '{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}';
    let customer_email = '{{ auth()->user()->email }}';
    let ct = "MTI | {{ $class->name }}";
    let logo = 'https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618846580/mti_logo_sm.png';


   ( function makePayment() {
    FlutterwaveCheckout({
      public_key: pub_key,
      tx_ref: tx_ref,
      amount: amount,
      currency: "NGN",
      country: "NG",
      payment_options: "card,mobilemoney,ussd",
      redirect_url: redirect_url,
      customer: {
        email: customer_email,
        name: customer_name,
      },
      customizations: {
        title: ct,
        logo: logo,
      },
    });
  })()
</script>
@endif
@endsection