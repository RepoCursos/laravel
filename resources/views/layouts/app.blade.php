<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> @yield('title') </title>
</head>

<body>
    <!-- El concepto de Layouts se puede apreciar en el video: Episódio 2 - Dominando BLADE Time:7:25 -->
    <!-- @-includeLa directiva le permite incluir una vista de Blade desde otra vista "_partials". Todas las variables
        que estén disponibles para la vista de los padres se pondrán a disposición de la opción incluida -->
    @include('layouts._partials.messages')

    <!-- la @-yield directiva se utiliza para mostrar el contenido de una sección determinada -->
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>