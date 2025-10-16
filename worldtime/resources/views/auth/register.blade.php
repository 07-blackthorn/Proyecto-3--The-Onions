@extends('layouts.app')

@section('title', 'WorldTime - Registro')

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Crea tu cuenta en WorldTime</span>
</header>

<!-- Contenedor del registro -->
<div class="login-container">
    <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf
        <h2>Crear Cuenta</h2>

        @if ($errors->any())
            <div class="message error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label for="name">Nombre completo</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Ingresa tu nombre completo" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Ingresa tu teléfono" required>
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <textarea id="address" name="address" placeholder="Ingresa tu dirección completa" rows="3" required>{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Mínimo 6 caracteres" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" required>
        </div>

        <button type="submit" class="btn-login">Registrarse en WorldTime</button>

        <div class="register-link">
            <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
        </div>
    </form>
</div>
@endsection