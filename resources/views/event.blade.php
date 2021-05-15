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
                    {{-- alert message from session --}}
                    @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message') " />
                    @endif

                    <article class="mb-4 excerpt">
                        <label for="">Prospects</label>
                        <article>
                            {{ $upcoming->description }}
                        </article>
                        @if ($upcoming->type == "class")
                        {{-- opening if statemet --}}
                        <p class="price btn btn-info text-capitalize mt-3"><strong>Class Price:
                                ₦{{ number_format($upcoming->price, 2)  }}</strong></p>
                        <article>
                            <strong>
                                Lectures would be held live via a zoom class. To participate in the lectures, after
                                payment has been made and confirmed, the link to the live zoom class will be sent to
                                your email address.
                            </strong>
                        </article>
                        @auth
                        {{-- opening auth --}}
                        @if ( $upcoming->payments->where('user', auth()->user()->email)->where('payment_status',
                        1)->first())
                        <p class="mt-3">
                            <strong style="font-weight: 600; font-size: 14px">
                                Your payment has been received. The zoom link invite for this class would be sent to
                                your mail and also be displayed on your dashboard, under the <q>Registered Courses</q>
                                tab. The class would commence on -- --. For more enquires,
                                <a href="mailto:support@midastouchacademy.com">Send us a mail</a>
                            </strong>
                        </p>
                        @else
                        @if (boolval(auth()->user()->email_verified))
                        <a href="{{ route('make_payment',  $upcoming->link_id) }}" class="btn btn-success mt-3">Proceed
                            with payment</a>
                        @else
                        <p class="mt-3">
                            <strong style="font-weight: 600; font-size: 14px">
                                You haven't verified your email.
                                Your email has to be verified before
                                you can register for a class. Click on the button below to resend verification link to
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
                        <p class="mt-3"><strong>N:B: You need to be logged in to register for this class.</strong></p>
                        <a href="{{ route('login') }}" class="btn btn-default">Login</a>
                        {{-- closing auth --}}
                        @endauth
                        {{-- closing if statement --}}
                        @endif
                    </article>

                </article>

                @if ($upcoming->type == "class")
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
                @endif

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
    let amount = "{{ $upcoming->price }}";
    let currency = "NGN";
    let redirect_url = "{{ route('confirm_payment') }}";
    let payment_option = "card";
    let customer_name = '{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}';
    let customer_email = '{{ auth()->user()->email }}';
    let ct = "MTI | {{ $upcoming->name }}";
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
