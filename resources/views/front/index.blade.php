<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, srink-to-fit=no" >

    <title>{{ config('app.name', 'MOYA') }}</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

</head>
<body>
    <main id="m-select-sede" class="m-select-sede">
        <div class="m-select-sede-bg" style="background-image:url({{ asset('images/bg_login.jpg') }})">
            <div class="m-select-sede-shape"></div>
        </div>
        <div class="container">
            <div class="m-select-card">
                <div class="m-select-card-header">
                    <div class="m-select-card-brand">
                        <img src="{{ asset('images/logo_moya.svg') }}" alt="Logotipo Moya">
                    </div>
                    <p class="m-select-card-title">Selecciona tu sede</p>
                </div>
                <div class="m-select-card-body">
                    {!!Form::open(['route'=>'sede.redirect','method'=>'POST'])!!}
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!!Form::select('sede',$sedes,null,['class'=>'form-control m-form-select','placeholder'=>'Sedes'])!!}
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="form-group">
                            {!!Form::submit('Entrar',['class'=>'btn m-btn-black'])!!}
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </main>
</body>
</html>