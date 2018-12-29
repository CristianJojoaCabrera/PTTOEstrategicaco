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
        <br>
        <h3>Bienvenido a InVitro</h3>
        <p>Complete el Formulario para restablecer la contraseña</p>
        <br>
        <form class="m-t" method="POST" action="{{ route('password.request') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group row">
                    <input placeholder="Correo" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group row">
                <input placeholder="Nueva contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
            </div>
            <div class="form-group row">
                <input placeholder="Confirmar contraseña" id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                    @endif

            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">
                    Restablecer Contraseña
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
