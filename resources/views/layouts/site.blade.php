<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Compiling Logics'))</title>

        @vite(['resources/css/site.css', 'resources/js/site.js'])
    </head>
    <body class="antialiased">
        <x-header />

        <main>
            @yield('content')
        </main>

        <x-footer />
    </body>
</html>
