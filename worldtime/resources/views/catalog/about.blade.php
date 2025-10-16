@extends('layouts.app')

@section('title', 'WorldTime - Sobre Nosotros')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<!-- Encabezado centrado -->
<header class="header">
    <h1 class="main-title">WorldTime</h1>
    <span class="subtitle">Conoce Nuestra Historia y Valores</span>
</header>

<!-- Barra de navegación -->
<nav class="navbar">
    <div class="nav-links">
        <a href="{{ route('catalog.index') }}">Catálogo</a>
        <a href="{{ route('catalog.offers') }}">Ofertas</a>
        <a href="{{ route('catalog.news') }}">Novedades</a>
        <a href="{{ route('catalog.brands') }}">Marcas</a>
        <a href="{{ route('catalog.about') }}" class="active">Sobre Nosotros</a>
    </div>
    <div class="user-info">
        <span>Bienvenido, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Cerrar Sesión</button>
        </form>
    </div>
</nav>

<!-- Sobre Nosotros -->
<section class="products-container">
    <div class="about-container">
        <div class="about-section">
            <h2 class="about-title">Nuestra Historia</h2>
            <p class="about-text">
                WorldTime nació en 2010 con una visión clara: ofrecer relojes de calidad excepcional que combinen 
                artesanía tradicional con innovación contemporánea. Desde nuestros humildes comienzos como una 
                pequeña boutique familiar, hemos crecido hasta convertirnos en un referente en el mundo de la 
                relojería, manteniendo siempre nuestro compromiso con la excelencia y la satisfacción del cliente.
            </p>
            <p class="about-text">
                A lo largo de los años, hemos establecido asociaciones con las marcas más prestigiosas del sector 
                y hemos desarrollado nuestras propias colecciones exclusivas, siempre guiados por nuestra pasión 
                por el tiempo y su medición precisa.
            </p>
        </div>

        <div class="mission-vision-grid">
            <div class="mission-card">
                <h3 class="mission-title">Misión</h3>
                <p class="about-text">
                    Ofrecer relojes excepcionales que representen el perfecto equilibrio entre tradición horológica 
                    e innovación, proporcionando a nuestros clientes no solo un instrumento para medir el tiempo, 
                    sino una pieza de arte que cuente su propia historia.
                </p>
            </div>
            <div class="vision-card">
                <h3 class="vision-title">Visión</h3>
                <p class="about-text">
                    Ser la empresa líder en relojería a nivel mundial, reconocida por nuestra calidad, innovación 
                    y compromiso con la sostenibilidad, inspirando a las generaciones futuras a valorar el tiempo 
                    como nuestro recurso más preciado.
                </p>
            </div>
        </div>

        <div class="about-section">
            <h2 class="about-title">Nuestros Valores</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">⏱️</div>
                    <h4 class="value-title">Precisión</h4>
                    <p>Comprometidos con la exactitud y calidad en cada pieza.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🌟</div>
                    <h4 class="value-title">Excelencia</h4>
                    <p>Buscamos la perfección en cada detalle y servicio.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">💚</div>
                    <h4 class="value-title">Sostenibilidad</h4>
                    <p>Practicas responsables y respeto por el medio ambiente.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h4 class="value-title">Confianza</h4>
                    <p>Relaciones duraderas basadas en la transparencia.</p>
                </div>
            </div>
        </div>

        <div class="about-section">
            <h2 class="about-title">Nuestro Equipo</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo" style="background: #556B2F; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem;">👨‍💼</div>
                    <h4 class="member-name">Carlos Rodríguez</h4>
                    <div class="member-role">Fundador & CEO</div>
                </div>
                <div class="team-member">
                    <div class="member-photo" style="background: #8FA31E; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem;">👩‍💼</div>
                    <h4 class="member-name">Ana Martínez</h4>
                    <div class="member-role">Directora de Diseño</div>
                </div>
                <div class="team-member">
                    <div class="member-photo" style="background: #C6D870; color: #556B2F; display: flex; align-items: center; justify-content: center; font-size: 2rem;">👨‍🔧</div>
                    <h4 class="member-name">Miguel Torres</h4>
                    <div class="member-role">Master Relojero</div>
                </div>
                <div class="team-member">
                    <div class="member-photo" style="background: #556B2F; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem;">👩‍💻</div>
                    <h4 class="member-name">Laura Sánchez</h4>
                    <div class="member-role">Directora de Tecnología</div>
                </div>
            </div>
        </div>

        <div class="contact-info">
            <h3 class="contact-title">Contáctanos</h3>
            <p class="about-text">
                📧 info@worldtime.com<br>
                📞 +1 (555) 123-4567<br>
                🏢 Av. del Tiempo 123, Ciudad Horaria<br>
                ⏰ Lunes a Viernes: 9:00 - 18:00
            </p>
        </div>
    </div>
</section>
@endsection