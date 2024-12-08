<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QLS Assessment - Alex Blackburn</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<header class="flex flex-col justify-center text-center my-4">
    <h1 class="text-3xl mb-2">404 Not Found</h1>
    <h2 class="text-lg">{{ $exception->getMessage() }}</h2>
</header>
</body>
</html>
