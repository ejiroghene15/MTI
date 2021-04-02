<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>MTI | @yield('title', "Home")</title>
        @include('layout.styles')
    </head>

    <body>
        <div id="page_layout">
            @yield('body')
        </div>
        @include('layout.scripts')
    </body>

</html>
