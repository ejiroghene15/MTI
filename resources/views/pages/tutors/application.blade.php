@extends('layout.master')
@section('title', 'Become a Tutor')
@section('styles')
@parent
<link rel="stylesheet" href="/css/dropify.min.css">
@endsection

@section('body')
@include('partials.nav')

<main id="login_page">
    {{-- They'll need to fill their names, the courses they want to take, their experience level and attach a CV --}}
    <section class="px-3">
        <form method="post">
            @csrf
            @if (session('message'))
            <x-alert :type="session('type')" :message="session('message') " />
            @endif
            <div class="form-wrapper">
                <header>Become a Tutor</header>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control form-control-alternative" name="fname"
                                value="{{ old('fname') }}" autocomplete="off">
                            @error('fname') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control form-control-alternative" name="lname"
                                value="{{ old('lname') }}" autocomplete="off">
                            @error('lname') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control form-control-alternative" name="email"
                                value="{{ old('email') }}" autocomplete="off">
                            @error('email') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Course you want to tutor</label>
                            <select name="course" class="form-control form-control-alternative">
                                @foreach ($courses as $course)
                                <option value="{{ $course->course_title }}">{{ $course->course_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Experience Level</label>
                            <select name="exp_level" class="form-control form-control-alternative">
                                <option value="Proficient">Proficient</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Upload CV</label>
                            <input type="file" class="form-control dropify" name="profilepix" accept=".doc, .pdf"
                                data-default-file="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button class="btn btn-default text-capitalize">Send Application</button>
                </div>

            </div>

        </form>
    </section>

</main>

@include('partials.footer')
@endsection

@section('js')
@parent
<script src="/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection
