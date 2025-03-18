
document.addEventListener('DOMContentLoaded', function() {
    // Sample car data (in a real app, this would come from a database via PHP)
    const cars = [
        {
            id: "1",
            make: "Porsche",
            model: "911 Carrera S",
            year: 2023,
            price: 141350,
            mileage: 5621,
            fuelType: "Gasoline",
            transmission: "Automatic",
            description: "Experience the ultimate driving pleasure with this iconic Porsche 911 Carrera S. This precision-engineered masterpiece combines breathtaking performance with timeless design.",
            features: ["Leather Interior", "Navigation System", "Bluetooth", "Heated Seats", "Parking Sensors", "Adaptive Cruise Control", "Sport Chrono Package"],
            imageUrl: "https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
            gallery: [
                "https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
                "https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
                "https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80"
            ]
        },
        {
            id: "2",
            make: "Tesla",
            model: "Model S Plaid",
            year: 2023,
            price: 129990,
            mileage: 1200,
            fuelType: "Electric",
            transmission: "Automatic",
            description: "The Tesla Model S Plaid is the highest performing sedan ever built. With the lowest drag coefficient of any production car and unmatched performance and range.",
            features: ["Autopilot", "Full Self-Driving Hardware", "17\" Touchscreen", "Ultra High-Fidelity Sound", "Wireless Charging", "Premium Connectivity", "Tri Motor AWD"],
            imageUrl: "https://images.unsplash.com/photo-1560958089-b8a1929cea89?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1771&q=80",
            gallery: [
                "https://images.unsplash.com/photo-1560958089-b8a1929cea89?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1771&q=80",
                "https://images.unsplash.com/photo-1617788138017-80ad40651399?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
                "https://images.unsplash.com/photo-1593941707882-a5bba53a0297?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1772&q=80"
            ]
        },
        {
            id: "3",
            make: "Mercedes-Benz",
            model: "S-Class AMG",
            year: 2023,
            price: 165000,
            mileage: 3500,
            fuelType: "Gasoline",
            transmission: "Automatic",
            description: "The Mercedes-Benz S-Class AMG is the pinnacle of luxury performance. Crafted with exquisite materials and advanced technology for an unparalleled driving experience.",
            features: ["Nappa Leather", "MBUX Infotainment", "Burmester 3D Surround Sound", "Head-Up Display", "Massage Seats", "Ambient Lighting", "24\" Wheels"],
            imageUrl: "https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
            gallery: [
                "https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
                "https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80",
                "https://images.unsplash.com/photo-1590362891991-f776e747a588?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80"
            ]
        }
    ];

    // Function to format price
    function formatPrice(price) {
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(price);
    }

    // Function to create a car card
    function createCarCard(car) {
        return `
            <div class="car-card">
                <div class="car-image">
                    <img src="${car.imageUrl}" alt="${car.make} ${car.model}">
                    <div class="image-overlay"></div>
                </div>
                <div class="car-details">
                    <div class="car-header">
                        <div>
                            <h3 class="car-title">${car.make} ${car.model}</h3>
                            <p class="car-year">${car.year}</p>
                        </div>
                        <span class="car-price">${formatPrice(car.price)}</span>
                    </div>
                    <div class="car-specs">
                        <div class="spec">
                            <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 8V12L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.63604 18.364C4.00736 16.7353 3 14.4853 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 14.4853 19.9926 16.7353 18.364 18.364" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 21V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 21H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            ${car.mileage.toLocaleString()} mi
                        </div>
                        <div class="spec">
                            <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.1414 5C17.3265 3.14864 14.7974 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 12C22 17.5228 17.5228 22 12 22C9.20261 22 6.67349 20.8514 4.85858 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 15C8 13.3431 9.34315 12 11 12H12C13.6569 12 15 13.3431 15 15V22H8V15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M19 12H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12H5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            ${car.fuelType}
                        </div>
                        <div class="spec">
                            <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 9H4V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 9H20V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 15H4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 15H20V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            ${car.transmission}
                        </div>
                        <div class="spec">
                            <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 19.5V18H20V19.5C20 20.3284 19.3284 21 18.5 21H5.5C4.67157 21 4 20.3284 4 19.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 14V7M12 7L16 11M12 7L8 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 3V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Features: ${car.features.length}
                        </div>
                    </div>
                    <a href="car-details.php?id=${car.id}" class="btn-view-details">View Details</a>
                </div>
            </div>
        `;
    }

    // Populate featured cars on homepage
    const featuredCarsGrid = document.getElementById('featured-cars-grid');
    if (featuredCarsGrid) {
        let featuredCarsHTML = '';
        // Show only 3 cars for featured section
        const featuredCars = cars.slice(0, 3);
        
        featuredCars.forEach(car => {
            featuredCarsHTML += createCarCard(car);
        });
        
        featuredCarsGrid.innerHTML = featuredCarsHTML;
    }
});
