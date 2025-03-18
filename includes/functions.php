
<?php
// Format price to currency
function formatPrice($price) {
    return '$' . number_format($price, 0);
}

// Get all cars (or filtered subset)
function getCars($type = null, $filter = null) {
    // In a real app, you would fetch this from a database
    // For now, we'll use static data similar to the JavaScript version
    $cars = [
        [
            'id' => '1',
            'make' => 'Porsche',
            'model' => '911 Carrera S',
            'year' => 2023,
            'price' => 141350,
            'mileage' => 5621,
            'fuelType' => 'Gasoline',
            'transmission' => 'Automatic',
            'description' => 'Experience the ultimate driving pleasure with this iconic Porsche 911 Carrera S. This precision-engineered masterpiece combines breathtaking performance with timeless design.',
            'features' => ['Leather Interior', 'Navigation System', 'Bluetooth', 'Heated Seats', 'Parking Sensors', 'Adaptive Cruise Control', 'Sport Chrono Package'],
            'imageUrl' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80'
            ]
        ],
        [
            'id' => '2',
            'make' => 'Tesla',
            'model' => 'Model S Plaid',
            'year' => 2023,
            'price' => 129990,
            'mileage' => 1200,
            'fuelType' => 'Electric',
            'transmission' => 'Automatic',
            'description' => 'The Tesla Model S Plaid is the highest performing sedan ever built. With the lowest drag coefficient of any production car and unmatched performance and range.',
            'features' => ['Autopilot', 'Full Self-Driving Hardware', '17" Touchscreen', 'Ultra High-Fidelity Sound', 'Wireless Charging', 'Premium Connectivity', 'Tri Motor AWD'],
            'imageUrl' => 'https://images.unsplash.com/photo-1560958089-b8a1929cea89?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1771&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1560958089-b8a1929cea89?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1771&q=80',
                'https://images.unsplash.com/photo-1617788138017-80ad40651399?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1593941707882-a5bba53a0297?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1772&q=80'
            ]
        ],
        [
            'id' => '3',
            'make' => 'Mercedes-Benz',
            'model' => 'S-Class AMG',
            'year' => 2023,
            'price' => 165000,
            'mileage' => 3500,
            'fuelType' => 'Gasoline',
            'transmission' => 'Automatic',
            'description' => 'The Mercedes-Benz S-Class AMG is the pinnacle of luxury performance. Crafted with exquisite materials and advanced technology for an unparalleled driving experience.',
            'features' => ['Nappa Leather', 'MBUX Infotainment', 'Burmester 3D Surround Sound', 'Head-Up Display', 'Massage Seats', 'Ambient Lighting', '24" Wheels'],
            'imageUrl' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1590362891991-f776e747a588?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80'
            ]
        ],
        [
            'id' => '4',
            'make' => 'Audi',
            'model' => 'RS e-tron GT',
            'year' => 2023,
            'price' => 143900,
            'mileage' => 1800,
            'fuelType' => 'Electric',
            'transmission' => 'Automatic',
            'description' => 'The Audi RS e-tron GT represents the future of electric performance. With captivating design and exhilarating acceleration, it\'s the perfect blend of sustainability and power.',
            'features' => ['Matrix LED Headlights', 'Carbon Fiber Elements', 'Virtual Cockpit', 'Bang & Olufsen Sound', 'Air Suspension', '800V Architecture', 'Quattro AWD'],
            'imageUrl' => 'https://images.unsplash.com/photo-1614200179396-2bdb77ebf81b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1614200179396-2bdb77ebf81b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1600259828526-77f8617cebd9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80',
                'https://images.unsplash.com/photo-1616422285623-13ff0162193c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80'
            ]
        ],
        [
            'id' => '5',
            'make' => 'BMW',
            'model' => 'i8',
            'year' => 2022,
            'price' => 147500,
            'mileage' => 8200,
            'fuelType' => 'Hybrid',
            'transmission' => 'Automatic',
            'description' => 'The BMW i8 is a revolutionary sports car combining electrification with exhilarating driving dynamics. Its futuristic design and innovative engineering make it truly one-of-a-kind.',
            'features' => ['Scissor Doors', 'Carbon Fiber Construction', 'iDrive System', 'Harman Kardon Audio', 'Laser Headlights', 'Head-Up Display', 'Dynamic Damper Control'],
            'imageUrl' => 'https://images.unsplash.com/photo-1556800572-1b8aedf4b31f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1556800572-1b8aedf4b31f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80',
                'https://images.unsplash.com/photo-1543854589-fdd815f176e0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80'
            ]
        ],
        [
            'id' => '6',
            'make' => 'Lamborghini',
            'model' => 'Huracán',
            'year' => 2023,
            'price' => 261274,
            'mileage' => 1200,
            'fuelType' => 'Gasoline',
            'transmission' => 'Automatic',
            'description' => 'The Lamborghini Huracán embodies pure Italian performance with its aggressive styling and naturally aspirated V10 engine. A true supercar that delivers an unforgettable driving experience.',
            'features' => ['Carbon Ceramic Brakes', 'Adaptive Magnetorheological Suspension', 'Drive Select Modes', 'Carbon Fiber Components', 'Full Digital Instrument Cluster', 'Alcantara Interior', 'Performance Traction Control'],
            'imageUrl' => 'https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
                'https://images.unsplash.com/photo-1580414057403-c5f451f30e1c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80',
                'https://images.unsplash.com/photo-1518987048-93e29699e79a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80'
            ]
        ]
    ];
    
    // Apply filters if needed
    $filteredCars = $cars;
    
    // Filter by type (new/used)
    if ($type === 'new') {
        $filteredCars = array_filter($filteredCars, function($car) {
            return $car['mileage'] < 5000;
        });
    } elseif ($type === 'used') {
        $filteredCars = array_filter($filteredCars, function($car) {
            return $car['mileage'] >= 5000;
        });
    }
    
    // Filter by fuel type
    if ($filter === 'electric') {
        $filteredCars = array_filter($filteredCars, function($car) {
            return $car['fuelType'] === 'Electric';
        });
    } elseif ($filter === 'hybrid') {
        $filteredCars = array_filter($filteredCars, function($car) {
            return $car['fuelType'] === 'Hybrid';
        });
    } elseif ($filter === 'gasoline') {
        $filteredCars = array_filter($filteredCars, function($car) {
            return $car['fuelType'] === 'Gasoline';
        });
    }
    
    return array_values($filteredCars);
}

// Get car by ID
function getCarById($id) {
    $cars = getCars();
    
    foreach ($cars as $car) {
        if ($car['id'] === $id) {
            return $car;
        }
    }
    
    return null;
}
