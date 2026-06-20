<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    
    <!-- Tailwind & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <link rel="stylesheet" href="/styles/comercial.css">
    <title>{{ $title ?? 'Comercial - Rolser' }}</title>
</head>

<body class="contenedor">
    @include('comercial.comercial-menu')

    <!-- Page Content -->
    {{ $slot }}

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>

