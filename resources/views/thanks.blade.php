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
    <div class="w-full max-w-5xl p-6 mx-auto my-8 rounded-lg ng-gray-50">
        <div class="p-4 space-y-6">
            <a href="/" class="block mx-auto text-center max-w-max">
                <img src="{{ asset('img/logo.png') }}" alt="survey"
                    class="block object-cover h-32 mx-auto rounded-full aspect-video">
            </a>
            <div class="flex flex-wrap justify-center gap-6 ">
                <div
                    class="flex justify-center flex-col gap-8 p-6 w-[80%] mx-auto max-w-[500px] bg-white rounded-lg shadow-lg">
                    <span class="block mx-auto text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-24 h-24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </span>
                    <h1 class="py-6 text-xl font-bold text-center">
                        Thanks for taking the survey
                    </h1>
                    <button class="mx-auto text-lg text-center max-w-max">Your total survey is
                        <span class="font-medium">{{ auth()->user()->surveys->count() }}</span></button>
                </div>
            </div>
            <a href="javascript:history.go(-1)"
                class="block px-6 py-2 mx-auto text-white rounded-md shadow-sm bg-primary max-w-max">Back
                to Form</a>
        </div>
    </div>
</body>

</html>
