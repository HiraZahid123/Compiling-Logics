<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

        <title>@yield('title', config('app.name', 'Compiling Logics'))</title>
        <meta name="description" content="@yield('description', 'Compiling Logics builds AI agents, workflow automation and custom software that replace manual systems with ones that run themselves.')">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Compiling Logics">
        <meta property="og:title" content="@yield('title', config('app.name', 'Compiling Logics'))">
        <meta property="og:description" content="@yield('description', 'Compiling Logics builds AI agents, workflow automation and custom software that replace manual systems with ones that run themselves.')">
        <meta property="og:url" content="{{ url()->current() }}">

        {{-- Web fonts load without blocking the first paint; text shows in the fallback font until they arrive. --}}
        <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
        <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=electrolize:400|lato:400,700|space-grotesk:400,500,700&display=swap">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=electrolize:400|lato:400,700|space-grotesk:400,500,700&display=swap" media="print" onload="this.media='all'">
        <noscript><link rel="stylesheet" href="https://fonts.bunny.net/css?family=electrolize:400|lato:400,700|space-grotesk:400,500,700&display=swap"></noscript>

        @vite(['resources/css/site.css', 'resources/js/site.js'])
    </head>
    <body class="antialiased">
        <x-header />

        <main>
            @yield('content')
        </main>

        <x-footer />

        <x-agentic-chat />

        <x-message-sent-popup />
    </body>
</html>
