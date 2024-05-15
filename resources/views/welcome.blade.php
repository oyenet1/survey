<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Survey Sphere</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->

</head>

<body class="antialiased">
    <div class="w-full max-w-5xl p-6 mx-auto my-8 rounded-lg shadow ng-gray-50">
        <div class="p-4 space-y-6">
            <a href="/" class="block mx-auto text-center max-w-max">
                <img src="{{ asset('img/logo.png') }}" alt="survey"
                    class="block object-cover h-32 mx-auto rounded-full aspect-video">
            </a>
            <div class="space-y-3">
                <h1 class="text-3xl font-semibold text-center text-blue-500">Welcome to Survey Sphere</h1>
                <p class="text-lg font-semibold text-center">Click on the state below to start</p>
            </div>

            <div class="flex flex-wrap justify-center gap-6 ">
                @foreach (auth()->user()->states as $state)
                    <a href="{{ route('survey', $state->name) }}"
                        class="px-6 py-2 text-lg capitalize border rounded shadow-sm ">{{ $state->name . ' state' }}</a>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
