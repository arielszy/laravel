<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistema de puntaje de clientes" />
        <meta name="author" content="Ariel Szyniak" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Minimarket's friends</title>
    </head>
    <body>
    {{-- yield(algun nombre) indica que ese espacio sera reemplazado en otra vista por el contenido que se le envie --}}
    @yield('content')
    @yield('foot')
    </body>
    {{-- custom css y js --}}
    @yield('custom-css-js')
    {{-- bootstrap css y js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</html>