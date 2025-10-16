@extends('layouts.app')

@section('title', 'WorldTime - Novedades')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
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