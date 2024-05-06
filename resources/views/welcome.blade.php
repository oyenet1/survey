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
    <div class="w-full max-w-5xl my-8 mx-auto ng-gray-50 rounded-lg p-6 shadow">
        <div class="p-4 space-y-6">
            <img src="{{ asset('img/logo.png') }}" alt="survey"
                class="block rounded-full mx-auto aspect-video  h-40 object-cover">
            <div class="space-y-3">
                <h1 class="text-3xl font-semibold text-center text-blue-500">Welcome to Survey Sphere</h1>
                <p class="text-lg text-center font-semibold">Click on the state below to start</p>
            </div>

            <div class=" flex flex-wrap gap-6 justify-center">
                @foreach (\App\Models\State::all() as $state)
                    <a href="{{ route('survey', $state->name) }}"
                        class="capitalize text-lg py-2 rounded border shadow-sm px-6 ">{{ $state->name . ' state' }}</a>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
