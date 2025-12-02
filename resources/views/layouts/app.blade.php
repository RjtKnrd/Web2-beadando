<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title', 'Mozi Projekt')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{-- Hyperspace CSS --}}
    <link rel="stylesheet" href="{{ asset('theme/hyperspace/assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('theme/hyperspace/assets/css/noscript.css') }}" /></noscript>

    @stack('styles')
</head>
<body class="is-preload">

    {{-- HEADER --}}
    @include('partials.header')

    {{-- PAGE CONTENT --}}
    <div id="wrapper">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- Hyperspace JS --}}
    <script src="{{ asset('theme/hyperspace/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/hyperspace/assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('theme/hyperspace/assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ asset('theme/hyperspace/assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('theme/hyperspace/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('theme/hyperspace/assets/js/util.js') }}"></script>
    <script src="{{ asset('theme/hyperspace/assets/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>


