<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles with Vite -->
    @routes
    @vite(['resources/js/app.js'])

    @inertiaHead

    <!-- Additional Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Katibeh:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=HK+Grotesk:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abel:wght@400&display=swap" />

    <!-- Conditionally Load CSS with Vite -->
    @php
        $component = $page['component'] ?? '';
    @endphp

    @if (str_starts_with($component, 'HomePage'))
        @vite('resources/css/home.css')
    @elseif ($component === 'MainPage')
        @vite('resources/css/index.css')
    @endif

</head>
<body class="font-sans antialiased">
@inertia
</body>

<div id="app">
    @if(request()->is('mainpage'))
        <MainHeaderComponent></MainHeaderComponent>
    @else
        <header-component></header-component>
    @endif
</div>
</html>
