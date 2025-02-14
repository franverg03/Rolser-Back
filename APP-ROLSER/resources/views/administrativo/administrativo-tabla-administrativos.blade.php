<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="antialiased">
    {{-- <livewire:counter /> --}}

    @livewire('tabla-administrativos')

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
