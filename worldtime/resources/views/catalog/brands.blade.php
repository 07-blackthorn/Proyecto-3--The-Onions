@extends('layouts.app')

@section('title', 'WorldTime - Marcas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<style>
    .brands-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .brand-card {
        background: #EFF5D2;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(85, 107, 47, 0.2);
        transition: all 0.3s ease;
        border: 2px solid #C6D870;
        text-align: center;
    }
    
    .brand-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(85, 107, 47, 0.3);
    }
    
    .brand-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-bottom: 2px solid #C6D870;
    }
    
    .brand-content {
        padding: 1.5rem;
    }
    
    .brand-name {
        font-size: 1.4rem;
        color: #556B2F;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }
    
    .brand-foundation {
        color: #8FA31E;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }
    
    .brand-description {
        color: #556B2F;
        line-height: 1.6;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }
    
    .brand-stats {
        display: flex;
        justify-content: space-around;
        background: rgba(143, 163, 30, 0.1);
        padding: 0.75rem;
        border-radius: 8px;
        margin-top: 1rem;
    }
    
    .stat {
        text-align: center;
    }
    
    .stat-number {
        font-size: 1.2rem;
        font-weight: bold;
        color: #556B2F;
    }
    
    .stat-label {
        font-size: 0.8rem;
        color: #8FA31E;
    }
    
    .view-products {
        background: linear-gradient(135deg, #556B2F 0%, #8FA31E 100%);
        color: #EFF5D2;
        border: none;
        border-radius: 5px;
        padding: 0.7rem 1.5rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
        width: 100%;
    }
    
    .view-products:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(85, 107, 47, 0.3);
    }
</style>
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