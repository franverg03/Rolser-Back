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

<body class="contenedor404 flex flex-col justify-center items-center w-[1920px] h-[1080px]">
    <h3 class="textoArriba mb-6">¡Ups! Parece que hemos perdido una rueda por el camino...</h3>
    <div class="error404 flex flex-row">
        <h1 class="estilo4 m-4">4</h1>
        <img class="img404" src="/images/rueda404rolser.png" alt="">
        <h1 class="estilo4 m-4">4</h1>
    </div>
    <h4 class="textoAbajo mt-6">Veamos si encontramos una de repuesto.</h4>
    <a href="{{ route('administrativo.clientes') }}" class="volverHome flex justify-center items-center">Rebuscar</a>
</body>

</html>
