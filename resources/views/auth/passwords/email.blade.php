
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InVitro</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <img src="{{ asset('img/logo.png') }}" class="img-responsive">
        </div>
        <h3>Bienvenido a InVitro</h3>
        <p>Recuperar Contraseña</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="m-t" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group row">
                    <br><br>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Correo Para restablecer contraseña">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">
                     Recibir Link Recuperación Contraseña
                </button>
            </form>
        <p class="m-t"> <small>&copy; 2018</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
