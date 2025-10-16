@extends('layouts.app')

@section('title', 'WorldTime - Ofertas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<style>
    .discount-badge {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: bold;
        font-size: 0.9rem;
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 2;
    }
    
    .price-original {
        text-decoration: line-through;
        color: #999;
        font-size: 1rem;
        margin-right: 0.5rem;
    }
    
    .price-discount {
        color: #ff6b6b;
        font-size: 1.3rem;
        font-weight: bold;
    }
    
    .offer-card {
        position: relative;
        overflow: hidden;
    }
    
    .offer-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        z-index: 1;
    }
</style>
@endsection

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Ofertas Especiales - Tiempo Limitado</span>
</header>

<!-- Barra de navegación -->
<nav class="navbar">
    <div class="nav-links">
        <a href="{{ route('catalog.index') }}">Catálogo</a>
        <a href="{{ route('catalog.offers') }}" class="active">Ofertas</a>
        <a href="{{ route('catalog.news') }}">Novedades</a>
        <a href="{{ route('catalog.brands') }}">Marcas</a>
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

<!-- Ofertas -->
<section class="products-container">
    <div class="products-grid">
        @foreach($offers as $offer)
        <div class="product-card offer-card">
            <div class="discount-badge">-{{ $offer['discount'] }}%</div>
            <img src="{{ $offer['image'] }}" alt="{{ $offer['name'] }}" class="product-image">
            <div class="product-info">
                <h3 class="product-name">{{ $offer['name'] }}</h3>
                <p class="product-description">{{ $offer['description'] }}</p>
                <div class="product-price">
                    <span class="price-original">${{ number_format($offer['original_price'], 2) }}</span>
                    <span class="price-discount">${{ number_format($offer['discount_price'], 2) }}</span>
                </div>
                <div class="product-actions">
                    <button class="btn-details">Ver Detalles</button>
                    <button class="btn-cart">Aprovechar Oferta</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/catalogo.js') }}"></script>
@endsection