<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

        <title>@yield('title', config('app.name', 'Compiling Logics'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
        <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=electrolize:400|lato:400,700|space-grotesk:400,500,700&display=swap">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=electrolize:400|lato:400,700|space-grotesk:400,500,700&display=swap">

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
