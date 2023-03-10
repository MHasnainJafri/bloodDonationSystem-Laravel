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
        <style>
            body {
  background-color: #ffcccc;
}

body {
  font-family: 'Montserrat', sans-serif;
}

body {
  font-size: 16px;
}
.navbar {
  background-color: #cc0000;
}
.nav-link {
  color: #fff;
  font-weight: bold;
}

.navbar .active {
  background-color: #ff3333;
}
.navbar {
  border-bottom: 2px solid #cc0000;
}
thead th {
  background-color: #cc0000;
  color: #fff;
}
tbody td {
  padding: 10px;
}
tbody tr:hover {
  background-color: #ffe6e6;
}
body {
  background: linear-gradient(to bottom right, #ffcccc, #ff3333);
}
tbody tr {
  background-color: #ffe6e6;
}
thead th {
  color: #fff;
}
table {
  border: 2px solid #cc0000;
}
table {
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.btn-primary {
  background-color: #cc0000;
  border-color: #cc0000;
}
.btn-primary {
  color: #fff;
}
.btn-primary:hover {
  background-color: #ff3333;
  border-color: #ff3333;
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
