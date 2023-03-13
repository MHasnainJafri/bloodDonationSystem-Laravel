<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <style>
        body {
            background-color: #fa4753;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            font-size: 16px;
        }

        .navbar {
            background-color: #fa4753;
        }

        .nav-link {
            color: #fff;
            font-weight: bold;
        }

        .navbar .active {
            background-color: #ff3333;
        }

        .navbar {
            border-bottom: 2px solid #fa4753;
        }

        thead th {
            background-color: #fa4753;
            color: #fff;
        }

        tbody td {
            padding: 10px;
        }

        tbody tr:hover {
            background-color: #ffe6e6;
        }

        body {
            background: linear-gradient(to bottom right, #fa4753, #ff3333);
        }

        tbody tr {
            background-color: #ffe6e6;
        }

        thead th {
            color: #fff;
        }

        table {
            border: 2px solid #fa4753;
        }

        table {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #fa4753;
            border-color: #fa4753;
        }

        .btn-primary {
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #ff3333;
            border-color: #ff3333;
        }

        .bloodtag {
            font-size: 15px;
            padding: 6px 16px;
            color: white;
            border-radius: 20px;
            font-weight: 700;
            background: #fa4753;

        }
        .text-blue-500{
            color: rgb(93, 93, 249);
            display: block;
        }
        .text-red-500{
            color: #fa4753;
            display: block;
            
        }
    </style> --}}


    <style>
        .card {
            background: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255, 255, 255, 0.40) 0%, rgba(0, 0, 0, 0.25) 200%);
            /* background-blend-mode: multiply; */
            /* background: linear-gradient(to bottom, #D5DEE7 0%, #E8EBF2 50%, #E2E7ED 100%), linear-gradient(to bottom, rgba(0,0,0,0.02) 50%, rgba(255,255,255,0.02) 61%, rgba(0,0,0,0.02) 73%), linear-gradient(33deg, rgba(255,255,255,0.20) 0%, rgba(0,0,0,0.20) 100%); */
            background-blend-mode: normal, color-burn;
            background-image: linear-gradient(to top, #d5dee7 0%, #ffafbd 0%, #c9ffbf 100%);
            background-image: radial-gradient(73% 147%, #EADFDF 59%, #ECE2DF 100%), radial-gradient(91% 146%, rgba(255, 255, 255, 0.50) 47%, rgba(0, 0, 0, 0.50) 100%);
            background-blend-mode: screen;
            background-image: linear-gradient(-20deg, #ddd6f3 0%, #faaca8 100%, #faaca8 100%);
            border-radius: 20px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main style="margin: 30px">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
