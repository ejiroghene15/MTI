<header id="main_header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-default" id="general_nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img
                    src="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618846193/mti_logo_lg.png" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default"
                aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="javascript:void(0)">
                                <img
                                    src="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618846580/mti_logo_sm.png" />
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="false">
                            <span>Courses <i class="ni ni-bold-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right course-menu">
                            <section>
                                @forelse ($courses as $course)
                                <a class="dropdown-item"
                                    href="{{ route('course_info',  $course->slug ) }}">{{ $course->course_title }}</a>
                                @empty
                                <strong class="dropdown-item">Courses not available</strong>
                                @endforelse
                            </section>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="/blog">
                            <span>Blog</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('library') }}">
                            <span>Library</span>
                        </a>
                    </li>

                    @auth

                    <li class="nav-item dropdown">

                        <span class="avatar avatar-lg rounded-circle d-none d-lg-block" role="button"
                            data-toggle="dropdown" aria-haspopup="false">
                            <img alt="Profile pixture" src="{{ auth()->user()->picture }}" height="58" width="58"
                                style="object-fit: cover" />
                        </span>
                        <a class="nav-link nav-link-icon d-block d-lg-none" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="false">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}

                            <i class="ni ni-bold-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('login') }}">
                            <span>Log in</span>
                        </a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>
