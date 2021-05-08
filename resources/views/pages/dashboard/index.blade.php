@extends('layout.master')
@section('title', "Dashboard | $user->first_name")
@section('styles')
@parent
<link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dropify.min.css">
@endsection
@section('body')

@include('partials.nav')

<main id="dashboard" class="profile-page">


    <div class="wrapper">
        <section class="section-profile-cover section-shaped my-0">
            <!-- Circles background -->
            <img class="bg-image" src="{{ asset('images/bio-bg.jpg') }}" style="width: 100%;">
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>

        <section class="section bg-secondary">
            <div class="container">
                <div class="card card-profile shadow mt--300">
                    <div class="px-4">
                        <div class="row justify-content-center">

                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a data-toggle="tab" href="#profile" class="profile-tab">
                                        <img src="{{ $user->picture ?? 'https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg' }}"
                                            class="rounded-circle">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                                <div class="card-profile-actions py-4 px-0 mt-lg-0">
                                    <a data-toggle="tab" href="#edit-profile" type="button"
                                        class="btn btn-icon btn-3 btn-primary mr-4 profile-tab text-capitalize">
                                        <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                                        <span class="btn-inner--text">Profile</span>
                                    </a>
                                    <a data-toggle="tab" href="#settings" type="button"
                                        class="btn btn-icon btn-3 btn-default float-right profile-tab text-capitalize">
                                        <span class="btn-inner--icon"><i class="ni ni-settings-gear-65"></i></span>
                                        <span class="btn-inner--text">Settings</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 order-lg-1">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">0</span>
                                        <span class="description">Courses Registered</span>
                                    </div>
                                    <div>
                                        <span class="heading">0</span>
                                        <span class="description">Courses Completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (session('message'))
                        <x-alert :type="session('type')" :message="session('message') " />
                        @endif

                        <div class="tab-pane" id="profile">
                            @include('pages.dashboard.profile')
                        </div>

                        <div class="tab-pane" id="edit-profile" style="display: none">
                            @include('pages.dashboard.edit-profile')
                        </div>

                        <div class="tab-pane" id="settings" style="display: none">
                            @include('pages.dashboard.settings')
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <hr>
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-md-6">
                        <div class="copyright">
                            &copy; {{ date('Y') }} <a href="" target="_blank">Midas Touch Academy</a>.
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

</main>
@endsection

@section('js')
@parent
<script src="/js/dropify.min.js"></script>
<script>
    $(".profile-tab").on("click", function () {
let id = $(this).attr("href");
if(id.match("#edit-profile") || id.match('#settings')){
    $(".card-profile").css("background", "#f4f5f7");
}else{
    $(".card-profile").css("background", "#fff");
}
$(".tab-pane").hide();
$(`${id}`).fadeIn();
});

$('.dropify').dropify();

</script>
@endsection
