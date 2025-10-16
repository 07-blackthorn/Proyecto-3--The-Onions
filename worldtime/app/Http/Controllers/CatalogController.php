<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Reloj Clásico Elegante',
                'description' => 'Reloj analógico con correa de cuero genuino y esfera de zafiro.',
                'price' => 249.99,
                'image' => 'https://via.placeholder.com/300x200/556B2F/EFF5D2?text=Reloj+Clásico'
            ],
            [
                'id' => 2,
                'name' => 'Smartwatch Pro',
                'description' => 'Reloj inteligente con monitor de actividad y GPS integrado.',
                'price' => 189.99,
                'image' => 'https://via.placeholder.com/300x200/8FA31E/EFF5D2?text=Smartwatch'
            ],
            [
                'id' => 3,
                'name' => 'Cronómetro Deportivo',
                'description' => 'Reloj resistente al agua con cronómetro y alarma.',
                'price' => 129.99,
                'image' => 'https://via.placeholder.com/300x200/C6D870/556B2F?text=Reloj+Deportivo'
            ],
            [
                'id' => 4,
                'name' => 'Edición Limitada Oro',
                'description' => 'Reloj de lujo con caja de acero inoxidable bañado en oro.',
                'price' => 799.99,
                'image' => 'https://via.placeholder.com/300x200/556B2F/EFF5D2?text=Reloj+Lujo'
            ],
            [
                'id' => 5,
                'name' => 'Colección Vintage',
                'description' => 'Reloj con diseño retro y correa de cuero envejecido.',
                'price' => 299.99,
                'image' => 'https://via.placeholder.com/300x200/8FA31E/EFF5D2?text=Reloj+Vintage'
            ],
            [
                'id' => 6,
                'name' => 'Diseño Minimalista',
                'description' => 'Reloj con esfera limpia y correa de malla metálica.',
                'price' => 179.99,
                'image' => 'https://via.placeholder.com/300x200/C6D870/556B2F?text=Reloj+Minimalista'
            ]
        ];

        return view('catalog.index', compact('products'));
    }
    public function offers()
    {
        $offers = [
            [
                'id' => 101,
                'name' => 'Smartwatch Pro - Oferta',
                'description' => 'Reloj inteligente con 40% de descuento. Monitor de actividad, GPS y resistencia al agua.',
                'original_price' => 299.99,
                'discount_price' => 179.99,
                'discount' => 40,
                'image' => 'https://via.placeholder.com/300x200/8FA31E/EFF5D2?text=Oferta+40%'
            ],
            [
                'id' => 102,
                'name' => 'Reloj Deportivo - Promo',
                'description' => 'Cronómetro deportivo con 25% de descuento. Ideal para actividades al aire libre.',
                'original_price' => 159.99,
                'discount_price' => 119.99,
                'discount' => 25,
                'image' => 'https://via.placeholder.com/300x200/556B2F/EFF5D2?text=Oferta+25%'
            ],
            [
                'id' => 103,
                'name' => 'Edición Especial - Oferta Flash',
                'description' => 'Reloj de edición limitada con 30% de descuento por tiempo limitado.',
                'original_price' => 399.99,
                'discount_price' => 279.99,
                'discount' => 30,
                'image' => 'https://via.placeholder.com/300x200/C6D870/556B2F?text=Oferta+30%'
            ],
            [
                'id' => 104,
                'name' => 'Reloj Minimalista - Descuento',
                'description' => 'Diseño minimalista con 20% de descuento. Estilo contemporáneo y elegante.',
                'original_price' => 199.99,
                'discount_price' => 159.99,
                'discount' => 20,
                'image' => 'https://via.placeholder.com/300x200/8FA31E/EFF5D2?text=Oferta+20%'
            ]
        ];

        return view('catalog.offers', compact('offers'));
    }

    public function news()
    {
        $news = [
            [
                'title' => 'Nueva Colección Primavera 2024',
                'description' => 'Descubre nuestra exclusiva colección de relojes de primavera con diseños frescos y colores vibrantes.',
                'date' => '2024-03-15',
                'image' => 'https://via.placeholder.com/400x250/556B2F/EFF5D2?text=Nueva+Colección'
            ],
            [
                'title' => 'Tecnología Innovadora en Smartwatches',
                'description' => 'Presentamos nuestra nueva línea de smartwatches con monitoreo de salud avanzado y batería de larga duración.',
                'date' => '2024-03-10',
                'image' => 'https://via.placeholder.com/400x250/8FA31E/EFF5D2?text=Tecnología+Nueva'
            ],
            [
                'title' => 'Colaboración con Diseñador Internacional',
                'description' => 'WorldTime se asocia con reconocido diseñador para lanzar edición limitada de relojes de lujo.',
                'date' => '2024-03-05',
                'image' => 'https://via.placeholder.com/400x250/C6D870/556B2F?text=Colaboración'
            ],
            [
                'title' => 'Sistema de Garantía Extendida',
                'description' => 'Ahora ofrecemos garantía extendida de 3 años en todos nuestros relojes mecánicos.',
                'date' => '2024-02-28',
                'image' => 'https://via.placeholder.com/400x250/556B2F/EFF5D2?text=Garantía+Extendida'
            ]
        ];

        return view('catalog.news', compact('news'));
    }

    public function brands()
    {
        $brands = [
            [
                'name' => 'Timex',
                'description' => 'Relojes americanos con más de 160 años de historia. Conocidos por su durabilidad y estilo clásico.',
                'foundation' => 1854,
                'image' => 'https://via.placeholder.com/300x200/556B2F/EFF5D2?text=TIMEX',
                'products_count' => 45
            ],
            [
                'name' => 'Casio',
                'description' => 'Tecnología japonesa innovadora. Especialistas en relojes digitales y resistentes.',
                'foundation' => 1946,
                'image' => 'https://via.placeholder.com/300x200/8FA31E/EFF5D2?text=CASIO',
                'products_count' => 62
            ],
            [
                'name' => 'Seiko',
                'description' => 'Artesanía japonesa de precisión. Pioneros en tecnología de cuarzo y movimientos automáticos.',
                'foundation' => 1881,
                'image' => 'https://via.placeholder.com/300x200/C6D870/556B2F?text=SEIKO',
                'products_count' => 38
            ],
            [
                'name' => 'Fossil',
                'description' => 'Diseño contemporáneo y estilo urbano. Combinando tradición horológica con modernidad.',
                'foundation' => 1984,
                'image' => 'https://via.placeholder.com/300x200/556B2F/EFF5D2?text=FOSSIL',
                'products_count' => 55
            ],
            [
                'name' => 'Citizen',
                'description' => 'Tecnología Eco-Drive innovadora. Relojes alimentados por luz, sin necesidad de baterías.',
                'foundation' => 1918,
                'image' => 'https://via.placeholder.com/300x200/8FA31E/EFF5D2?text=CITIZEN',
                'products_count' => 41
            ],
            [
                'name' => 'Swatch',
                'description' => 'Diseños coloridos y asequibles. Revolucionando la industria relojera suiza desde 1983.',
                'foundation' => 1983,
                'image' => 'https://via.placeholder.com/300x200/C6D870/556B2F?text=SWATCH',
                'products_count' => 29
            ]
        ];

        return view('catalog.brands', compact('brands'));
    }

    public function about()
    {
        return view('catalog.about');
    }

}