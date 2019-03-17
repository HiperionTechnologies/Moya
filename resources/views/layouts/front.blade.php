<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, srink-to-fit=no" >

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MOYA') }}</title>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <!-- @switch(request()->segment(1))
        @case('eventos')
            <link rel="stylesheet" href="Estilos Eventos">
            @break
        @case('convocatoria')
            <link rel="stylesheet" href="Estilos Convocatoria">
            @break
        @case('comunidad')
            <link rel="stylesheet" href="Estilos Comunidad">
            @break
        @default
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endswitch -->
</head>
<body>
    <header id="m-header">
        <div class="m-header-logo">
            <a href="{{route('moya',[request()->segment(1)])}}" title='MOYA'>
            <img src="{{ asset('images/logo_moya.svg') }}" alt="Logotipo Moya">
            </a>
        </div>
        <div class="m-header-nav">
            <nav>
                <a href="{{route('eventos',[request()->segment(1)])}}" class="m-header-nav-link">Eventos</a>
                <a href="{{route('convocatoria',[request()->segment(1)])}}" class="m-header-nav-link">Convocatoria</a>
                <a href="{{route('comunidad',[request()->segment(1)])}}" class="m-header-nav-link">Comunidad</a>
            </nav>
        </div>
        <div id="js-burger" class="m-header-burger">
            <span class="m-header-burger-line"></span>
            <span class="m-header-burger-line"></span>
            <span class="m-header-burger-line"></span>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer id="m-footer">
        <div class="m-footer-moya">
            <div class="m-footer-moya-text">
                <img src="{{ asset('images/logo_moya_white.svg') }}" alt="Logotipo Moya">
            </div>
        </div>
        <div class="m-footer-social">
            <a href='#' class="m-footer-social-link"><i class="fab fa-facebook-f"></i></a>
            <a href='#' class="m-footer-social-link"><i class="fab fa-instagram"></i></a>
            <a href='#' class="m-footer-social-link"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="m-footer-legals">
            <a href='#' class="m-footer-terms">Términos y condiciones</a>
            <a href='#' class="m-footer-privacy">Aviso de privacidad</a>
        </div>
        <div class="m-footer-copy">
            <p>&copy; 2018 MOYA - Mercado Orgánico Y de Artesanías</p>
        </div>
    </footer>
    <div id="m-social" class="m-social">
        <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>
    <div id="m-lightbox" class="m-lightbox-menu">
        <div class="m-lightbox-menu_header">
            <div id="js-menu-close" class="m-lightbox-menu_header_close">
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="m-lightbox-menu_body">
            <nav>
                <a href="/eventos" class="m-lightbox-menu_link">Eventos</a>
                <a href="/comunidad" class="m-lightbox-menu_link">Comunidad</a>
                <a href="/convocatoria" class="m-lightbox-menu_link">Convocatoria</a>
            </nav>
        </div>
    </div>

</body>
</html>
