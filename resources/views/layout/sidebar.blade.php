{{-- sidebar navigation --}}
<aside class="sidebar sidebar-left">
    <ul>
        <li class="d-none">
            <a href="/dashboard" class="{{ @$index_active }}">
                <span class="material-icons">
                    dashboard
                </span>
                <span class="icon">
                    <img src="{{ asset('images/icons/dashboard.png') }}" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index') }}" class="{{ @$articles_active }}">
                <span class="material-icons">
                    article
                </span>
                <span class="icon">
                    <img src="{{ asset('images/icons/article.png') }}" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('articles.create') }}" class="{{ @$create_article }}">
                <span class="material-icons">
                    create
                </span>
                <span class="icon">
                    <img src="{{ asset('images/icons/writing.png') }}" alt="">
                </span>
            </a>
        </li>
        @auth
        <li>
            <a href="{{ route('my_profile') }}" class="{{ @$profile_active }}">
                <span class="material-icons">
                    person
                </span>
                <span class="icon">
                    <img src="{{ asset('images/icons/user.png') }}" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('settings') }}" class="{{ @$settings_active }}">
                <span class="material-icons">
                    settings
                </span>
                <span class="icon">
                    <img src="{{ asset('images/icons/individual.png') }}" alt="">
                </span>
            </a>
        </li>
        <li class="logout">
            <a href="{{ url('logout') }}">
                <span class="material-icons" style="display: block">
                    power_settings_new
                </span>
            </a>
        </li>
        @endauth
    </ul>
</aside>
