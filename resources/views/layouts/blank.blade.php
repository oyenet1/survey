<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>survey</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    <!-- Styles -->

</head>

<body class="antialiased bg-neutral-100">
    <div class="w-full px-6 lg:px-16 2xl:px-20 bg-white max-w-5xl my-8 mx-auto ng-gray-50 rounded-lg p-6 shadow">
        <div>
            <img src="{{ asset('img/logo.png') }}" alt="survey"
                class="block rounded-full mx-auto aspect-video  h-32 object-cover">
            <div class="space-y-3">
                <h1 class="text-3xl font-semibold text-center text-blue-500">Welcome to Survey Sphere</h1>

            </div>
        </div>
        {{ $slot }}
    </div>
</body>

</html>
