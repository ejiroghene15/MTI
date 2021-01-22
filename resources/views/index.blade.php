<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>MTI | Home</title>
        @include('layout.styles')
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-default">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Midas Touch Academy</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default"
                        aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-default">
                        <div class="navbar-collapse-header">
                            <div class="row">
                                <div class="col-6 collapse-brand">
                                    <a href="javascript:void(0)">
                                        <img src="/assets/img/brand/blue.png" />
                                    </a>
                                </div>
                                <div class="col-6 collapse-close">
                                    <button type="button" class="navbar-toggler" data-toggle="collapse"
                                        data-target="#navbar-default" aria-controls="navbar-default"
                                        aria-expanded="false" aria-label="Toggle navigation">
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
                                    <span>Academy <i class="fa fa-angle-down"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    <span>Library</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    <span>Blog</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    <span>Sign In</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="__mti_hero_section px-3">
                <div class="container-fluid position-relative">
                    <section class="__mti_hero_section_intro">
                        <h2> Midas Touch Academy</h2>
                        <h4 class="text-light">An online platform for remote learning, skill acquisition and
                            outsourcing.. </h4>
                        <a href="#" class="btn btn-default ">Join Academy</a>
                    </section>
                </div>
                <section id="scroll-down">
                    <a href="" class="__mit_bouncing_arrow"><i class="fa fa-chevron-down"></i> </a>
                </section>

            </div>
        </main>

        @include('layout.styles')
    </body>

</html>
