<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>survey</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Styles -->
    @filamentStyles
    @vite('resources/css/app.css')

</head>

<body class="antialiased bg-neutral-100">
    <div class="w-full max-w-5xl p-6 px-6 mx-auto my-8 bg-white rounded-lg shadow lg:px-16 2xl:px-20 ng-gray-50">
        <div>
            <img src="{{ asset('img/logo.png') }}" alt="survey"
                class="block object-cover h-32 mx-auto rounded-full aspect-video">
            <div class="space-y-3">
                <h1 class="text-3xl font-semibold text-center text-primary">Welcome to Survey Sphere</h1>

            </div>
        </div>
        {{ $slot }}
    </div>

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
