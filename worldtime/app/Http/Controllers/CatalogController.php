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
                'image' => asset('images/products/reloj1.jpg')
            ],
            [
                'id' => 2,
                'name' => 'Smartwatch Pro',
                'description' => 'Reloj inteligente con monitor de actividad y GPS integrado.',
                'price' => 189.99,
                'image' => asset('images/products/reloj4.jpg')
            ],
            [
                'id' => 3,
                'name' => 'Cronómetro Deportivo',
                'description' => 'Reloj resistente al agua con cronómetro y alarma.',
                'price' => 129.99,
                'image' => asset('images/products/reloj2.jpg')
            ],
            [
                'id' => 4,
                'name' => 'Edición Limitada Oro',
                'description' => 'Reloj de lujo con caja de acero inoxidable bañado en oro.',
                'price' => 799.99,
                'image' => asset('images/products/reloj3.jpg')
            ],
            [
                'id' => 5,
                'name' => 'Colección Vintage',
                'description' => 'Reloj con diseño retro y correa de cuero envejecido.',
                'price' => 299.99,
                'image' => asset('images/products/reloj6.jpg')
            ],
            [
                'id' => 6,
                'name' => 'Diseño Minimalista',
                'description' => 'Reloj con esfera limpia y correa de malla metálica.',
                'price' => 179.99,
                'image' => asset('images/products/reloj5.jpg')
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
                'image' => asset('images/products/reloj1.jpg')
            ],
            [
                'id' => 102,
                'name' => 'Reloj Deportivo - Promo',
                'description' => 'Cronómetro deportivo con 25% de descuento. Ideal para actividades al aire libre.',
                'original_price' => 159.99,
                'discount_price' => 119.99,
                'discount' => 25,
                'image' => asset('images/products/reloj2.jpg')
            ],
            [
                'id' => 103,
                'name' => 'Edición Especial - Oferta Flash',
                'description' => 'Reloj de edición limitada con 30% de descuento por tiempo limitado.',
                'original_price' => 399.99,
                'discount_price' => 279.99,
                'discount' => 30,
                'image' => asset('images/products/reloj3.jpg')
            ],
            [
                'id' => 104,
                'name' => 'Reloj Minimalista - Descuento',
                'description' => 'Diseño minimalista con 20% de descuento. Estilo contemporáneo y elegante.',
                'original_price' => 199.99,
                'discount_price' => 159.99,
                'discount' => 20,
                'image' => asset('images/products/reloj4.jpg')
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
                'image' => asset('images/products/reloj6.jpg')
            ],
            [
                'title' => 'Tecnología Innovadora en Smartwatches',
                'description' => 'Presentamos nuestra nueva línea de smartwatches con monitoreo de salud avanzado y batería de larga duración.',
                'date' => '2024-03-10',
                'image' => asset('images/products/reloj5.jpg')
            ],
            [
                'title' => 'Colaboración con Diseñador Internacional',
                'description' => 'WorldTime se asocia con reconocido diseñador para lanzar edición limitada de relojes de lujo.',
                'date' => '2024-03-05',
                'image' => asset('images/products/reloj4.jpg')
            ],
            [
                'title' => 'Sistema de Garantía Extendida',
                'description' => 'Ahora ofrecemos garantía extendida de 3 años en todos nuestros relojes mecánicos.',
                'date' => '2024-02-28',
                'image' => asset('images/products/reloj3.jpg')
            ]
        ];

        return view('catalog.news', compact('news'));
    }

    public function brands()
    {
        $brands = [
            [
                'name' => 'Rolex',
                'description' => 'Relojes americanos con más de 160 años de historia. Conocidos por su durabilidad y estilo clásico.',
                'foundation' => 1854,
                'image' => asset('images/brands/logo1.jpg'),
                'products_count' => 45
            ],
            [
                'name' => 'Fossil',
                'description' => 'Tecnología japonesa innovadora. Especialistas en relojes digitales y resistentes.',
                'foundation' => 1946,
                'image' => asset('images/brands/logo2.jpg'),
                'products_count' => 62
            ],
            [
                'name' => 'Chopard',
                'description' => 'Artesanía japonesa de precisión. Pioneros en tecnología de cuarzo y movimientos automáticos.',
                'foundation' => 1881,
                'image' => asset('images/brands/logo3.jpg'),
                'products_count' => 38
            ],
            [
                'name' => 'Lotus',
                'description' => 'Diseño contemporáneo y estilo urbano. Combinando tradición horológica con modernidad.',
                'foundation' => 1984,
                'image' => asset('images/brands/logo4.jpg'),
                'products_count' => 55
            ],
            [
                'name' => 'Citizen',
                'description' => 'Tecnología Eco-Drive innovadora. Relojes alimentados por luz, sin necesidad de baterías.',
                'foundation' => 1918,
                'image' => asset('images/brands/logo6.jpg'),
                'products_count' => 41
            ],
            [
                'name' => 'Zodiac',
                'description' => 'Diseños coloridos y asequibles. Revolucionando la industria relojera suiza desde 1983.',
                'foundation' => 1983,
                'image' => asset('images/brands/logo5.png'),
                'products_count' => 29
            ]
        ];

        return view('catalog.brands', compact('brands'));
    }

    public function about()
    {
        return view('catalog.about');
    }

    public function showProduct($id)
    {
        // Base de datos de productos, esto deberia ir en la base de datos
        $allProducts = [
            1 => [
                'id' => 1,
                'name' => 'Reloj Clásico Elegante',
                'description' => 'Reloj analógico con correa de cuero genuino y esfera de zafiro. Perfecto para ocasiones formales y eventos especiales.',
                'full_description' => 'Este reloj clásico combina la elegancia tradicional con la artesanía moderna. Fabricado con materiales de primera calidad, incluye una caja de acero inoxidable de 40mm, esfera de zafiro anti-rayaduras y movimiento automático suizo. La correa de cuero genuino garantiza comodidad durante todo el día.',
                'price' => 249.99,
                'original_price' => 299.99,
                'discount' => 17,
                'image' => asset('images/products/reloj1.jpg'),
                'gallery' => [
                    asset('images/products/reloj1.jpg'),
                    asset('images/products/reloj2.jpg'),
                    asset('images/products/reloj3.jpg')
                ],
                'specifications' => [
                    'Movimiento' => 'Automático Suizo',
                    'Caja' => 'Acero Inoxidable 40mm',
                    'Cristal' => 'Zafiro Anti-rayaduras',
                    'Resistencia al Agua' => '5 ATM (50m)',
                    'Correa' => 'Cuero Genuino Negro',
                    'Garantía' => '2 años'
                ],
                'features' => [
                    'Calendario fecha',
                    'Manecillas luminiscentes',
                    'Caja trasera transparente',
                    'Resistente a impactos'
                ],
                'stock' => 15,
                'sku' => 'WT-CL-001',
                'brand' => 'Rolex',
                'category' => 'Analógicos'
            ],
            2 => [
                'id' => 2,
                'name' => 'Smartwatch Pro',
                'description' => 'Reloj inteligente con monitor de actividad, GPS integrado y resistencia al agua.',
                'full_description' => 'El Smartwatch Pro redefine lo que un reloj inteligente puede hacer. Con pantalla AMOLED de 1.4", monitorización cardiaca 24/7, GPS integrado y resistencia al agua IP68. Perfecto para deportistas y profesionales activos.',
                'price' => 189.99,
                'original_price' => 249.99,
                'discount' => 24,
                'image' => asset('images/products/reloj4.jpg'),
                'gallery' => [
                    asset('images/products/reloj4.jpg'),
                    asset('images/products/reloj5.jpg')
                ],
                'specifications' => [
                    'Pantalla' => 'AMOLED 1.4"',
                    'Batería' => '7 días de duración',
                    'Conectividad' => 'Bluetooth 5.0, WiFi',
                    'Resistencia al Agua' => 'IP68',
                    'Sensores' => 'Cardíaco, GPS, Acelerómetro',
                    'Compatibilidad' => 'iOS & Android'
                ],
                'features' => [
                    'Notificaciones inteligentes',
                    'Monitor de sueño',
                    'Control de música',
                    'Asistente virtual'
                ],
                'stock' => 8,
                'sku' => 'WT-SW-002',
                'brand' => 'Fossil',
                'category' => 'Smartwatches'
            ],
            3 => [
                'id' => 3,
                'name' => 'Cronómetro Deportivo',
                'description' => 'Reloj resistente al agua con cronómetro, alarma y luz LED.',
                'full_description' => 'Diseñado para los amantes del deporte y la aventura. Este cronómetro cuenta con resistencia al agua de 100m, cronómetro profesional, luz LED integrada y alarma múltiple. Ideal para natación, running y actividades outdoor.',
                'price' => 129.99,
                'image' => asset('images/products/reloj2.jpg'),
                'gallery' => [
                    asset('images/products/reloj2.jpg')
                ],
                'specifications' => [
                    'Movimiento' => 'Cuarzo Digital',
                    'Caja' => 'Resina Polimérica',
                    'Resistencia al Agua' => '10 ATM (100m)',
                    'Cronómetro' => '1/100 segundos',
                    'Alarma' => 'Multialarma',
                    'Iluminación' => 'LED Autoiluminación'
                ],
                'features' => [
                    'Cronómetro profesional',
                    'Resistente a golpes',
                    'Alarma diaria',
                    'Calendario automático'
                ],
                'stock' => 25,
                'sku' => 'WT-SP-003',
                'brand' => 'Chopard',
                'category' => 'Deportivos'
            ],
            // ... agregar más productos según sea necesario
        ];

        $product = $allProducts[$id] ?? null;

        if (!$product) {
            abort(404, 'Producto no encontrado');
        }

        return view('catalog.product', compact('product'));
    }

}