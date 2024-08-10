<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="relative">
    <section class="relative grid grid-cols-6 gap-2 font-dmsans min-h-dvh bg-emerald-100 ">
        <aside class="col-span-1 overflow-y-auto h-dvh ">
            <x-layouts.v-sidebar />
        </aside>
        <section class="col-span-5 ">
            <div class="flex items-center justify-between py-3 pr-8 mb-2">
                <input type="search" placeholder="search anything ..." class="py-2 bg-white rounded-xl px-6    min-w-[350px]" />

                <div class="flex items-center space-x-3">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z" />
                    </svg>
                    <span class="flex items-center justify-center p-1 text-center text-white rounded-full bg-emerald-600 h-7 w-7">AV</span>
                </div>
            </div>
            <section class="px-10 py-6 mr-4 overflow-y-auto bg-white h-dvh rounded-tr-xl rounded-tl-xl">
                {{ $slot }}
            </section>
        </section>
    </section>
</body>

</html>

