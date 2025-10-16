@extends('layouts.app')

@section('title', 'WorldTime - Login')

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Tu portal de tiempo y control</span>
</header>

<!-- Contenedor del login -->
<div class="login-container">
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <h2>Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="message error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="********" required>
        </div>

        <button type="submit" class="btn-login">Acceder a WorldTime</button>

        <div class="register-link">
            <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
        </div>
    </form>
</div>
@endsection