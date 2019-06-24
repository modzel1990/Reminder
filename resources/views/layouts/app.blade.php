<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body>
        <div class="container">
                <header class="row">
                    @include('partials.nav')
                </header>
                @if (Request::path() == ('/'))
                    @include('partials.hero')
                @endif
            <div class="layout">
                <div id="main" class="row">

                        @yield('content')

                </div>
            </div>
            <footer class="row">
                    @include('partials.footer')
            </footer>
        </div>
        @include('partials.scripts')
    </body>
</html>