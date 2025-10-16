@extends('layouts.app')

@section('title', 'WorldTime - Novedades')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<style>
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .news-card {
        background: #EFF5D2;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(85, 107, 47, 0.2);
        transition: all 0.3s ease;
        border: 2px solid #C6D870;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(85, 107, 47, 0.3);
    }
    
    .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 2px solid #C6D870;
    }
    
    .news-content {
        padding: 1.5rem;
    }
    
    .news-title {
        font-size: 1.3rem;
        color: #556B2F;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }
    
    .news-date {
        color: #8FA31E;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }
    
    .news-description {
        color: #556B2F;
        line-height: 1.6;
        margin-bottom: 1rem;
    }
    
    .read-more {
        background: #C6D870;
        color: #556B2F;
        border: none;
        border-radius: 5px;
        padding: 0.5rem 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .read-more:hover {
        background: #8FA31E;
        color: #EFF5D2;
    }
</style>
@endsection

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Últimas Novedades y Noticias</span>
</header>

<!-- Barra de navegación -->
<nav class="navbar">
    <div class="nav-links">
        <a href="{{ route('catalog.index') }}">Catálogo</a>
        <a href="{{ route('catalog.offers') }}">Ofertas</a>
        <a href="{{ route('catalog.news') }}" class="active">Novedades</a>
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

<!-- Novedades -->
<section class="products-container">
    <div class="news-grid">
        @foreach($news as $item)
        <div class="news-card">
            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="news-image">
            <div class="news-content">
                <h3 class="news-title">{{ $item['title'] }}</h3>
                <div class="news-date">{{ \Carbon\Carbon::parse($item['date'])->format('d M Y') }}</div>
                <p class="news-description">{{ $item['description'] }}</p>
                <button class="read-more">Leer Más</button>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection