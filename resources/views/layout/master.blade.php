<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Midas Touch Academy | @yield('title', "Home")</title>
        <link rel="shortcut icon"
            href="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618846580/mti_logo_sm.png"
            type="image/x-icon">
        @section('styles')
        @include('layout.styles')
        @show
    </head>

    <body>

        <div id="page_layout">
            @yield('body')
        </div>

        @section('js')
        @include('layout.scripts')
        @show
    </body>

</html>