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
            <img src="{{ asset('img/logo.png') }}" alt="survey"
                class="block object-cover h-40 mx-auto rounded-full aspect-video">
            <div class="space-y-3">
                <h1 class="text-3xl font-semibold text-center text-blue-500">Welcome to Survey Sphere</h1>
                <p class="text-lg font-semibold text-center">Click on the state below to start</p>
            </div>

            <div class="flex flex-wrap justify-center gap-6 ">
                <div class="flex justify-center gap-8 p-6 w-[80%] mx-auto max-w-[300px] bg-white rounded-lg shadow-lg">
                    <span class="block text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-18 h-18">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </span>
                    <h1 class="text-xl font-bold text-center">
                        Thanks for taking the survey
                    </h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
