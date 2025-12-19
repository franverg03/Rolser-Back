<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/styles/404.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>404 Ups</title>
</head>

<body class="contenedor404 flex flex-col justify-center items-center w-full min-h-screen bg-white">
    <h3 class="textoArriba mb-6 text-xl xl:text-3xl 2xl:text-4xl">¡Ups! Parece que hemos perdido una rueda por el camino...</h3>
    <div class="error404 flex flex-row items-center">
        <h1 class="estilo4 m-4 !text-[150px] xl:!text-[200px] 2xl:!text-[300px]">4</h1>
        <img class="img404 w-32 xl:w-48 2xl:w-auto" src="/images/rueda404rolser.png" alt="">
        <h1 class="estilo4 m-4 !text-[150px] xl:!text-[200px] 2xl:!text-[300px]">4</h1>
    </div>
    <h4 class="textoAbajo mt-6 text-lg xl:text-2xl 2xl:text-3xl">Veamos si encontramos una de repuesto.</h4>
    <a href="{{ route('administrativo.clientes') }}" class="volverHome flex justify-center items-center">Rebuscar</a>
</body>
</html>
