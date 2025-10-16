@extends('layouts.app')

@section('title', 'WorldTime - Marcas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" href="{{ asset('css/brands.css') }}">
@endsection

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Descubre Nuestras Marcas Exclusivas</span>
</header>

<!-- Barra de navegación -->
<nav class="navbar">
    <div class="nav-links">
        <a href="{{ route('catalog.index') }}">Catálogo</a>
        <a href="{{ route('catalog.offers') }}">Ofertas</a>
        <a href="{{ route('catalog.news') }}">Novedades</a>
        <a href="{{ route('catalog.brands') }}" class="active">Marcas</a>
        <a href="{{ route('catalog.about') }}">Sobre Nosotros</a>
    </div>
    <div class="user-info">
        <span>Bienvenido, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Cerrar Sesión</button>
        </form>
    </div>
</nav>

<!-- Marcas -->
<section class="products-container">
    <div class="brands-grid">
        @foreach($brands as $brand)
        <div class="brand-card">
            <img src="{{ $brand['image'] }}" alt="{{ $brand['name'] }}" class="brand-image">
            <div class="brand-content">
                <h3 class="brand-name">{{ $brand['name'] }}</h3>
                <div class="brand-foundation">Fundada en {{ $brand['foundation'] }}</div>
                <p class="brand-description">{{ $brand['description'] }}</p>
                
                <div class="brand-stats">
                    <div class="stat">
                        <div class="stat-number">{{ $brand['products_count'] }}+</div>
                        <div class="stat-label">Productos</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">{{ now()->year - $brand['foundation'] }}</div>
                        <div class="stat-label">Años</div>
                    </div>
                </div>
                
                <button class="view-products">Ver Productos {{ $brand['name'] }}</button>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection