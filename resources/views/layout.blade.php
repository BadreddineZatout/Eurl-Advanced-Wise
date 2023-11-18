<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eurl Advanced & Wise</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>

<body>
    <div>
        <div id="header-container">
            <nav-header />
        </div>
        <div id="app">
            @yield('content')
        </div>
        <div>

        </div>
    </div>
</body>

</html>
