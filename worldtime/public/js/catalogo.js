// Actualizar valor del rango de precio
document.getElementById('price').addEventListener('input', function() {
    document.getElementById('price-value').textContent = '$' + this.value;
});

// Simulación de funcionalidad de botones
document.querySelectorAll('.btn-details').forEach(button => {
    button.addEventListener('click', function() {
        alert('Funcionalidad de detalles próximamente');
    });
});

document.querySelectorAll('.btn-cart').forEach(button => {
    button.addEventListener('click', function() {
        const productName = this.closest('.product-card').querySelector('.product-name').textContent;
        alert(`"${productName}" añadido al carrito`);
    });
});

document.querySelector('.btn-logout').addEventListener('click', function() {
    if(confirm('¿Estás seguro de que quieres cerrar sesión?')) {
        alert('Cerrando sesión...');
        // En una implementación real, redirigiría al login
        // window.location.href = 'index.html';
    }
});

// Funcionalidad de paginación
document.querySelectorAll('.page-btn').forEach(button => {
    button.addEventListener('click', function() {
        // Remover clase active de todos los botones
        document.querySelectorAll('.page-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Agregar clase active al botón clickeado
        this.classList.add('active');
        
        // Simular cambio de página
        if(this.textContent !== 'Siguiente') {
            alert(`Mostrando página ${this.textContent}`);
        } else {
            alert('Cargando siguiente página...');
        }
    });
});

// Funcionalidad de filtros
document.getElementById('category').addEventListener('change', function() {
    if(this.value !== 'all') {
        alert(`Filtrando por categoría: ${this.options[this.selectedIndex].text}`);
    }
});

document.getElementById('brand').addEventListener('change', function() {
    if(this.value !== 'all') {
        alert(`Filtrando por marca: ${this.options[this.selectedIndex].text}`);
    }
});

document.getElementById('search').addEventListener('keypress', function(e) {
    if(e.key === 'Enter' && this.value.trim() !== '') {
        alert(`Buscando: "${this.value}"`);
    }
});