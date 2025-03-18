
import { useState, useEffect } from 'react';
import { useLocation } from 'react-router-dom';
import Header from '../components/Header';
import Footer from '../components/Footer';
import { cars } from '../data/cars';
import CarCard from '../components/CarCard';

const Inventory = () => {
  const location = useLocation();
  const [searchParams, setSearchParams] = useState(new URLSearchParams(location.search));
  const [filteredCars, setFilteredCars] = useState(cars);
  const [activeFilters, setActiveFilters] = useState({
    make: "",
    priceRange: "",
    fuelType: "",
    year: "",
  });
  
  // Extract URL parameters if any
  useEffect(() => {
    const params = new URLSearchParams(location.search);
    setSearchParams(params);
    
    const type = params.get('type');
    const filter = params.get('filter');
    
    let filtered = [...cars];
    
    if (type === 'new') {
      filtered = filtered.filter(car => car.year >= 2023);
    } else if (type === 'used') {
      filtered = filtered.filter(car => car.year < 2023);
    }
    
    if (filter === 'electric') {
      filtered = filtered.filter(car => car.fuelType.toLowerCase() === 'electric');
    }
    
    setFilteredCars(filtered);
  }, [location.search]);
  
  const handleFilterChange = (filterType: string, value: string) => {
    setActiveFilters({
      ...activeFilters,
      [filterType]: value
    });
    
    let filtered = [...cars];
    
    // Apply all active filters
    if (activeFilters.make || filterType === 'make') {
      const activeMake = filterType === 'make' ? value : activeFilters.make;
      if (activeMake) {
        filtered = filtered.filter(car => car.make.toLowerCase() === activeMake.toLowerCase());
      }
    }
    
    if (activeFilters.fuelType || filterType === 'fuelType') {
      const activeFuelType = filterType === 'fuelType' ? value : activeFilters.fuelType;
      if (activeFuelType) {
        filtered = filtered.filter(car => car.fuelType.toLowerCase() === activeFuelType.toLowerCase());
      }
    }
    
    if (activeFilters.year || filterType === 'year') {
      const activeYear = filterType === 'year' ? value : activeFilters.year;
      if (activeYear) {
        filtered = filtered.filter(car => car.year.toString() === activeYear);
      }
    }
    
    if (activeFilters.priceRange || filterType === 'priceRange') {
      const activePriceRange = filterType === 'priceRange' ? value : activeFilters.priceRange;
      if (activePriceRange) {
        const [min, max] = activePriceRange.split('-').map(p => parseInt(p));
        filtered = filtered.filter(car => car.price >= min && (max ? car.price <= max : true));
      }
    }
    
    setFilteredCars(filtered);
  };
  
  const clearFilters = () => {
    setActiveFilters({
      make: "",
      priceRange: "",
      fuelType: "",
      year: "",
    });
    setFilteredCars(cars);
  };
  
  const makes = [...new Set(cars.map(car => car.make))];
  const years = [...new Set(cars.map(car => car.year))].sort((a, b) => b - a);
  const fuelTypes = [...new Set(cars.map(car => car.fuelType))];
  
  return (
    <div className="min-h-screen">
      <Header />
      
      <main className="pt-24 pb-20">
        <div className="container mx-auto px-4 md:px-8">
          <div className="flex flex-col md:flex-row gap-8">
            {/* Filters Sidebar */}
            <div className="w-full md:w-64 shrink-0">
              <div className="bg-white dark:bg-gray-900 rounded-lg shadow-sm p-6 sticky top-24">
                <div className="flex items-center justify-between mb-6">
                  <h2 className="text-xl font-semibold">Filters</h2>
                  <button
                    onClick={clearFilters}
                    className="text-sm text-gray-600 dark:text-gray-400 hover:text-primary transition-colors"
                  >
                    Clear All
                  </button>
                </div>
                
                <div className="space-y-6">
                  {/* Make Filter */}
                  <div>
                    <h3 className="text-sm font-medium mb-3">Make</h3>
                    <div className="space-y-2">
                      {makes.map(make => (
                        <label key={make} className="flex items-center">
                          <input
                            type="radio"
                            name="make"
                            value={make}
                            checked={activeFilters.make === make}
                            onChange={(e) => handleFilterChange('make', e.target.value)}
                            className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                          />
                          <span className="text-sm">{make}</span>
                        </label>
                      ))}
                    </div>
                  </div>
                  
                  {/* Price Range Filter */}
                  <div>
                    <h3 className="text-sm font-medium mb-3">Price Range</h3>
                    <div className="space-y-2">
                      <label className="flex items-center">
                        <input
                          type="radio"
                          name="priceRange"
                          value="0-100000"
                          checked={activeFilters.priceRange === "0-100000"}
                          onChange={(e) => handleFilterChange('priceRange', e.target.value)}
                          className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                        />
                        <span className="text-sm">Under $100,000</span>
                      </label>
                      <label className="flex items-center">
                        <input
                          type="radio"
                          name="priceRange"
                          value="100000-150000"
                          checked={activeFilters.priceRange === "100000-150000"}
                          onChange={(e) => handleFilterChange('priceRange', e.target.value)}
                          className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                        />
                        <span className="text-sm">$100,000 - $150,000</span>
                      </label>
                      <label className="flex items-center">
                        <input
                          type="radio"
                          name="priceRange"
                          value="150000-200000"
                          checked={activeFilters.priceRange === "150000-200000"}
                          onChange={(e) => handleFilterChange('priceRange', e.target.value)}
                          className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                        />
                        <span className="text-sm">$150,000 - $200,000</span>
                      </label>
                      <label className="flex items-center">
                        <input
                          type="radio"
                          name="priceRange"
                          value="200000-"
                          checked={activeFilters.priceRange === "200000-"}
                          onChange={(e) => handleFilterChange('priceRange', e.target.value)}
                          className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                        />
                        <span className="text-sm">$200,000+</span>
                      </label>
                    </div>
                  </div>
                  
                  {/* Fuel Type Filter */}
                  <div>
                    <h3 className="text-sm font-medium mb-3">Fuel Type</h3>
                    <div className="space-y-2">
                      {fuelTypes.map(fuelType => (
                        <label key={fuelType} className="flex items-center">
                          <input
                            type="radio"
                            name="fuelType"
                            value={fuelType}
                            checked={activeFilters.fuelType === fuelType}
                            onChange={(e) => handleFilterChange('fuelType', e.target.value)}
                            className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                          />
                          <span className="text-sm">{fuelType}</span>
                        </label>
                      ))}
                    </div>
                  </div>
                  
                  {/* Year Filter */}
                  <div>
                    <h3 className="text-sm font-medium mb-3">Year</h3>
                    <div className="space-y-2">
                      {years.map(year => (
                        <label key={year} className="flex items-center">
                          <input
                            type="radio"
                            name="year"
                            value={year.toString()}
                            checked={activeFilters.year === year.toString()}
                            onChange={(e) => handleFilterChange('year', e.target.value)}
                            className="mr-2 h-4 w-4 text-primary focus:ring-primary"
                          />
                          <span className="text-sm">{year}</span>
                        </label>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            {/* Car Listings */}
            <div className="flex-1">
              <div className="flex items-center justify-between mb-8">
                <h1 className="text-3xl font-bold">Our Inventory</h1>
                <p className="text-gray-600 dark:text-gray-400">
                  Showing {filteredCars.length} vehicles
                </p>
              </div>
              
              {filteredCars.length > 0 ? (
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                  {filteredCars.map((car, index) => (
                    <div 
                      key={car.id}
                      className="animate-fade-in opacity-0"
                      style={{ animationDelay: `${index * 100}ms`, animationFillMode: 'forwards' }}
                    >
                      <CarCard car={car} />
                    </div>
                  ))}
                </div>
              ) : (
                <div className="text-center py-16 bg-gray-50 dark:bg-gray-800 rounded-lg">
                  <svg className="mx-auto h-12 w-12 text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.17293 14.8321C7.20301 12.8622 7.20301 9.63395 9.17293 7.66403C11.1429 5.69411 14.3711 5.69411 16.341 7.66403C18.3109 9.63395 18.3109 12.8622 16.341 14.8321C14.3711 16.802 11.1429 16.802 9.17293 14.8321Z" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    <path d="M10.5858 13.4142L3.92893 20.0711" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    <path d="M10 10H16" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    <path d="M13 7V13" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                  </svg>
                  <h3 className="mt-2 text-lg font-medium">No vehicles found</h3>
                  <p className="mt-1 text-gray-500 dark:text-gray-400">Try adjusting your filters to find what you're looking for.</p>
                  <button
                    onClick={clearFilters}
                    className="mt-4 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 transition-colors"
                  >
                    Clear Filters
                  </button>
                </div>
              )}
            </div>
          </div>
        </div>
      </main>
      
      <Footer />
    </div>
  );
};

export default Inventory;
