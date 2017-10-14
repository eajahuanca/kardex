<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Kardex</title>

    <link rel="icon" type="image/png" href="{{ asset('plugin/login/img/icono.png') }}" />
    <link href="{{ asset('plugin/login/css/css.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('plugin/login/css/reset.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('plugin/login/css/style.css') }}" rel="stylesheet" type='text/css'>
</head>
<body >
    <a href="{{ route('password.request') }}" id="findpass" style="text-decoration: none;">Olvidaste tu contraseña?</a>
    <div class="form">
        <div class="forceColor"></div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            <div class="topbar">
                {{ csrf_field() }}
                <input type="text" placeholder="Usuario" name="us_cuenta" class="input" value="{{ old('us_cuenta') }}" autofocus/>
                <div class="spanColor"></div>
                <input type="password" class="input" id="password" placeholder="Contraseña" name="password" />
            </div>
            <button class="submit" id="submit" >INGRESAR</button>
        </form>          
    </div>
    <script src="{{ asset('plugin/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/login/js/index.js') }}"></script>
</body>
</html>
