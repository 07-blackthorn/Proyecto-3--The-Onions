@extends('layouts.app')

@section('title', 'WorldTime - Catálogo')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
@endsection

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Tu portal de tiempo y control</span>
</header>

<!-- Barra de navegación -->
<nav class="navbar">
    <div class="nav-links">
        <a href="{{ route('catalog.index') }}" class="{{ request()->routeIs('catalog.index') ? 'active' : '' }}">Catálogo</a>
        <a href="{{ route('catalog.offers') }}" class="{{ request()->routeIs('catalog.offers') ? 'active' : '' }}">Ofertas</a>
        <a href="{{ route('catalog.news') }}" class="{{ request()->routeIs('catalog.news') ? 'active' : '' }}">Novedades</a>
        <a href="{{ route('catalog.brands') }}" class="{{ request()->routeIs('catalog.brands') ? 'active' : '' }}">Marcas</a>
        <a href="{{ route('catalog.about') }}" class="{{ request()->routeIs('catalog.about') ? 'active' : '' }}">Sobre Nosotros</a>
    </div>
    <div class="user-info">
        <span>Bienvenido, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Cerrar Sesión</button>
        </form>
    </div>
</nav>

<!-- Filtros de productos -->
<section class="filters">
    <div class="filter-group">
        <label for="category">Categoría</label>
        <select id="category">
            <option value="all">Todas las categorías</option>
            <option value="analog">Analógicos</option>
            <option value="digital">Digitales</option>
            <option value="smart">Smartwatches</option>
            <option value="luxury">Lujo</option>
        </select>
    </div>
    <div class="filter-group">
        <label for="brand">Marca</label>
        <select id="brand">
            <option value="all">Todas las marcas</option>
            <option value="timex">Timex</option>
            <option value="casio">Casio</option>
            <option value="seiko">Seiko</option>
            <option value="fossil">Fossil</option>
        </select>
    </div>
    <div class="filter-group">
        <label for="price">Precio máximo</label>
        <input type="range" id="price" min="50" max="1000" value="500">
        <span id="price-value">$500</span>
    </div>
    <div class="filter-group">
        <label for="search">Buscar</label>
        <input type="text" id="search" placeholder="Nombre del reloj...">
    </div>
</section>

<!-- Galería de productos -->
<section class="products-container">
    <div class="products-grid">
        @foreach($products as $product)
        <div class="product-card">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
            <div class="product-info">
                <h3 class="product-name">{{ $product['name'] }}</h3>
                <p class="product-description">{{ $product['description'] }}</p>
                <div class="product-price">${{ number_format($product['price'], 2) }}</div>
                <div class="product-actions">
                    <button class="btn-details">Ver Detalles</button>
                    <button class="btn-cart">Añadir al Carrito</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="pagination">
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">Siguiente</button>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/catalogo.js') }}"></script>
@endsection