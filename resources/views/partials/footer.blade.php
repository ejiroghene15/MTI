<footer class="bg-default px-3 pt-4 pb-1" id="general_footer">
    <nav class="d-flex pb-2">
        <span>
            <a href="#">About</a>
            <a href="{{ route('our_team') }}">Our Team</a>
            <a href="#">Community</a>
            <a href="{{ route('tutors') }}">Tutors</a>
            <a href="#">Become a Tutor</a>
        </span>
        <span class="ml-auto social">
            <a href="#">
                <img src="{{ asset('/images/social/facebook.png') }}" alt="facebook">
            </a>
            <a href="#">
                <img src="{{ asset('/images/social/twitter.png') }}" alt="twitter">
            </a>
        </span>
    </nav>
    <p class="text-center text-light mb-2"> &copy; {{ date("Y") }} Midas Touch Academy</p>
</footer>
