@extends('layouts.app')

@section('title', 'WorldTime - ' . $product['name'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Detalles del Producto</span>
</header>

<!-- Barra de navegación -->
<nav class="navbar">
    <div class="nav-links">
        <a href="{{ route('catalog.index') }}">Catálogo</a>
        <a href="{{ route('catalog.offers') }}">Ofertas</a>
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

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="{{ route('catalog.index') }}">Catálogo</a> 
    <span>></span>
    <a href="#">{{ $product['category'] }}</a>
    <span>></span>
    <span class="current">{{ $product['name'] }}</span>
</div>

<!-- Detalles del Producto -->
<section class="product-detail-container">
    <div class="product-detail">
        <!-- Galería de Imágenes -->
        <div class="product-gallery">
            <div class="main-image">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" id="mainProductImage">
            </div>
            @if(count($product['gallery']) > 1)
            <div class="thumbnail-gallery">
                @foreach($product['gallery'] as $image)
                <img src="{{ $image }}" alt="Vista {{ $loop->iteration }}" class="thumbnail" 
                     onclick="changeMainImage('{{ $image }}')">
                @endforeach
            </div>
            @endif
        </div>

        <!-- Información del Producto -->
        <div class="product-info-detail">
            <div class="product-header">
                <h1 class="product-title">{{ $product['name'] }}</h1>
                <div class="product-sku">SKU: {{ $product['sku'] }}</div>
            </div>

            <div class="product-brand-category">
                <span class="brand">{{ $product['brand'] }}</span>
                <span class="category">{{ $product['category'] }}</span>
            </div>

            <div class="product-description-full">
                <p>{{ $product['full_description'] }}</p>
            </div>

            <!-- Precio -->
            <div class="product-pricing">
                @if(isset($product['original_price']))
                <div class="price-original-detail">${{ number_format($product['original_price'], 2) }}</div>
                <div class="price-discount-detail">${{ number_format($product['price'], 2) }}</div>
                <div class="discount-badge-detail">-{{ $product['discount'] }}%</div>
                @else
                <div class="price-normal-detail">${{ number_format($product['price'], 2) }}</div>
                @endif
            </div>

            <!-- Stock -->
            <div class="product-stock">
                @if($product['stock'] > 0)
                <span class="in-stock">✓ En stock ({{ $product['stock'] }} disponibles)</span>
                @else
                <span class="out-of-stock">✗ Agotado</span>
                @endif
            </div>

            <!-- Acciones -->
            <div class="product-actions-detail">
                <div class="quantity-selector">
                    <label for="quantity">Cantidad:</label>
                    <select id="quantity">
                        @for($i = 1; $i <= min($product['stock'], 10); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                
                <div class="action-buttons">
                    <button class="btn-add-cart-detail" 
                            {{ $product['stock'] == 0 ? 'disabled' : '' }}>
                        🛒 Añadir al Carrito
                    </button>
                    <button class="btn-buy-now" 
                            {{ $product['stock'] == 0 ? 'disabled' : '' }}>
                        ⚡ Comprar Ahora
                    </button>
                </div>
            </div>

            <!-- Envío y Garantía -->
            <div class="product-features-detail">
                <div class="feature-item">
                    <span class="feature-icon">🚚</span>
                    <span>Envío gratis en 24-48h</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🔄</span>
                    <span>Devolución en 30 días</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🛡️</span>
                    <span>Garantía 2 años</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Especificaciones Técnicas -->
    <div class="specifications-section">
        <h2 class="section-title">Especificaciones Técnicas</h2>
        <div class="specifications-grid">
            @foreach($product['specifications'] as $key => $value)
            <div class="spec-item">
                <span class="spec-key">{{ $key }}:</span>
                <span class="spec-value">{{ $value }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Características -->
    <div class="features-section">
        <h2 class="section-title">Características Principales</h2>
        <div class="features-grid">
            @foreach($product['features'] as $feature)
            <div class="feature-item-detail">
                <span class="feature-check">✓</span>
                <span>{{ $feature }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Productos Relacionados -->
    <div class="related-products">
        <h2 class="section-title">Productos Relacionados</h2>
        <div class="products-grid">
            <!-- Aquí irían productos relacionados -->
            <div class="related-placeholder">
                <p>Explora más productos en nuestra <a href="{{ route('catalog.index') }}">tienda principal</a></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
function changeMainImage(imageUrl) {
    document.getElementById('mainProductImage').src = imageUrl;
}

// Funcionalidad del carrito
document.querySelector('.btn-add-cart-detail').addEventListener('click', function() {
    const quantity = document.getElementById('quantity').value;
    const productName = '{{ $product["name"] }}';
    alert(`✅ ${quantity} x ${productName} añadido al carrito`);
});

document.querySelector('.btn-buy-now').addEventListener('click', function() {
    alert('🚀 Redirigiendo al proceso de compra...');
});

// Navegación entre productos
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        // Producto anterior
        const prevId = {{ $product['id'] }} - 1;
        if (prevId >= 1) {
            window.location.href = '{{ url("/product") }}/' + prevId;
        }
    } else if (e.key === 'ArrowRight') {
        // Producto siguiente
        const nextId = {{ $product['id'] }} + 1;
        if (nextId <= 3) { // Cambiar según cantidad de productos
            window.location.href = '{{ url("/product") }}/' + nextId;
        }
    }
});
</script>
@endsection