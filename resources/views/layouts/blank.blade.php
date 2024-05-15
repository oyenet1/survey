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

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body class="antialiased bg-neutral-100">
    <div class="w-full max-w-5xl p-6 px-6 mx-auto my-8 bg-white rounded-lg shadow lg:px-16 2xl:px-20 ng-gray-50">
        <div>
            <a href="/" class="block mx-auto text-center max-w-max">
                <img src="{{ asset('img/logo.png') }}" alt="survey"
                    class="block object-cover h-32 mx-auto rounded-full aspect-video">
            </a>
            <div class="space-y-3">
                <h1 class="text-3xl font-semibold text-center text-primary">Welcome to Survey Sphere</h1>
                <a href="{{ route('logout') }}"
                    class="flex items-center px-4 py-2 mx-auto text-sm text-white bg-black rounded hover:bg-red-500 max-w-max"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>

                    <span class="pl-2">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
        {{ $slot }}
    </div>
    <span class="inline-block w-full pb-3 mx-auto text-center">Powered by <a href="https://fedums.com.ng"
            class="font-medium text-primary">Cointrix Inc</a></span>


    {{-- notification --}}
    @livewire('notifications')
    {{-- @livewire('database-notifications') --}}

    @filamentScripts
    @vite('resources/js/app.js')


</body>

</html>
