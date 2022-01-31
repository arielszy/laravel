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
    <body class='bg-white'><!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand col-md-7" href="{{url('/')}}">Minimarket's friends</a>
                <a href='{{url('user/create')}}' class='btn btn-primary mb-2' >Alta de cliente</a>
                <a href='#' class='btn btn-primary mb-2' >Configuracion</a>
            </div>
        </nav>
        <div class="container text-center"><!-- muestra los errores de laravel si hay-->
        @if ($errors->any())
        <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
            @endforeach
         </ul>
        </div>
        @endif
        @if (Session::has('msg'))<!-- muestra mensajes de un solo uso enviados por session::flash-->
        <div class="alert alert-info text-center">
            {{Session::get('msg')}}
        </div>
        @endif 
        </div>
    {{-- yield(algun nombre) indica que ese espacio sera reemplazado en otra vista por el contenido que se le envie --}}
    <div class="container">
    @yield('content')
   </div>
   @yield('foot')
    </body>
  
    {{-- bootstrap css y js --}}
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  {{-- custom css y js --}}
  @yield('custom-css-js')
    </html>