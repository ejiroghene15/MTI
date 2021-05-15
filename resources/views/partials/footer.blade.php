<footer class="bg-default px-3 pt-4 pb-1" id="general_footer">
    <nav class="d-flex pb-2">
        <span>
            <a href="/blog">Blog</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('our_team') }}">Our Team</a>
            <a href="{{ route('tutors') }}">Tutors</a>
            <a href="{{ route('become_a_tutor') }}" class="d-none">Become a Tutor</a>
        </span>
        <span class="ml-auto social">
            <a href="{{ url('https://www.facebook.com/storiesuntold.truthhaven/') }}">
                <img src="{{ asset('/images/social/facebook.png') }}" alt="facebook">
            </a>
            <a href="{{ url('https://twitter.com/MTI_academy') }}">
                <img src="{{ asset('/images/social/twitter.png') }}" alt="twitter">
            </a>
            <a href="{{ url('https://www.linkedin.com/company/midas-touch-academy') }}">
                <img src="{{ asset('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1619244818/socials/linkedin.png') }}"
                    alt="linkedin">
            </a>
        </span>
    </nav>
    <p class="text-center text-light mb-2"> &copy; {{ date("Y") }} Midas Touch Academy</p>
</footer>
