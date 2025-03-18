
import { useState, useEffect } from 'react';
import { useParams, Link, useNavigate } from 'react-router-dom';
import Header from '../components/Header';
import Footer from '../components/Footer';
import ImageGallery from '../components/ImageGallery';
import { getCarById, formatPrice } from '../data/cars';

const CarDetails = () => {
  const { id } = useParams<{ id: string }>();
  const navigate = useNavigate();
  const [isVisible, setIsVisible] = useState(false);
  
  const car = id ? getCarById(id) : undefined;
  
  useEffect(() => {
    if (!car) {
      navigate('/inventory', { replace: true });
      return;
    }
    
    setTimeout(() => {
      setIsVisible(true);
    }, 100);
    
    // Scroll to top on component mount
    window.scrollTo(0, 0);
  }, [car, navigate]);
  
  if (!car) return null;
  
  return (
    <div className="min-h-screen">
      <Header />
      
      <main className="pt-24 pb-20">
        <div className="container mx-auto px-4 md:px-8">
          {/* Breadcrumbs */}
          <nav className="mb-8">
            <ol className="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
              <li>
                <Link to="/" className="hover:text-gray-900 dark:hover:text-white transition-colors">Home</Link>
              </li>
              <li>
                <span className="mx-2">/</span>
              </li>
              <li>
                <Link to="/inventory" className="hover:text-gray-900 dark:hover:text-white transition-colors">Inventory</Link>
              </li>
              <li>
                <span className="mx-2">/</span>
              </li>
              <li className="text-gray-900 dark:text-white font-medium truncate max-w-[200px]">
                {car.make} {car.model}
              </li>
            </ol>
          </nav>
          
          <div className={`transition-opacity duration-700 ${isVisible ? 'opacity-100' : 'opacity-0'}`}>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
              {/* Car Images */}
              <div>
                <ImageGallery images={car.gallery} alt={`${car.make} ${car.model}`} />
              </div>
              
              {/* Car Details */}
              <div>
                <div className="mb-6">
                  <div className="inline-block rounded-full px-3 py-1 bg-primary/10 text-primary text-sm font-medium mb-2">
                    {car.year} {car.make}
                  </div>
                  <h1 className="text-3xl md:text-4xl font-bold mb-2">{car.model}</h1>
                  <p className="text-2xl md:text-3xl font-bold text-primary">{formatPrice(car.price)}</p>
                </div>
                
                <p className="text-gray-700 dark:text-gray-300 mb-6">
                  {car.description}
                </p>
                
                <div className="grid grid-cols-2 gap-4 mb-8">
                  <DetailItem label="Year" value={car.year.toString()} />
                  <DetailItem label="Mileage" value={`${car.mileage.toLocaleString()} mi`} />
                  <DetailItem label="Fuel Type" value={car.fuelType} />
                  <DetailItem label="Transmission" value={car.transmission} />
                </div>
                
                <div className="space-y-4">
                  <button className="w-full py-3 rounded-md bg-primary text-white hover:bg-primary/90 transition-colors font-medium">
                    Schedule Test Drive
                  </button>
                  <button className="w-full py-3 rounded-md bg-transparent border border-primary text-primary hover:bg-primary/5 transition-colors font-medium">
                    Request More Info
                  </button>
                </div>
              </div>
            </div>
            
            {/* Features Section */}
            <div className="mb-12">
              <h2 className="text-2xl font-bold mb-6">Features & Specifications</h2>
              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                {car.features.map((feature, index) => (
                  <div 
                    key={index} 
                    className="flex items-center p-3 rounded-md bg-gray-50 dark:bg-gray-800"
                  >
                    <svg className="w-5 h-5 text-primary mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9 12L11 14L15 10M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>
                    <span>{feature}</span>
                  </div>
                ))}
              </div>
            </div>
            
            {/* Contact Section */}
            <div className="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 md:p-8">
              <div className="flex flex-col md:flex-row md:items-center md:justify-between">
                <div className="mb-6 md:mb-0">
                  <h2 className="text-2xl font-bold mb-2">Interested in this vehicle?</h2>
                  <p className="text-gray-600 dark:text-gray-400">
                    Contact our team for more information or to schedule a viewing.
                  </p>
                </div>
                <div className="flex flex-col sm:flex-row gap-4">
                  <a 
                    href="tel:+11234567890" 
                    className="flex items-center justify-center py-3 px-6 rounded-md bg-primary text-white hover:bg-primary/90 transition-colors font-medium"
                  >
                    <svg className="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.80227 14.7187C13.0599 18.9547 17.0202 19.117 18.6957 18.9551C19.2853 18.9111 19.8175 18.6206 20.2371 18.1999L21.75 16.689C22.6257 15.8147 22.4845 14.3278 21.4644 13.5719L19.6904 12.2295C18.8669 11.6122 17.738 11.6729 16.9799 12.3995L16.5562 12.9062Z" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>
                    Call Us
                  </a>
                  <Link 
                    to="/contact" 
                    className="flex items-center justify-center py-3 px-6 rounded-md bg-transparent border border-primary text-primary hover:bg-primary/5 transition-colors font-medium"
                  >
                    <svg className="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M21 5.5L12 13.5L3 5.5" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                      <path d="M3 5.5H21V18C21 18.1326 20.9473 18.2598 20.8536 18.3536C20.7598 18.4473 20.6326 18.5 20.5 18.5H3.5C3.36739 18.5 3.24021 18.4473 3.14645 18.3536C3.05268 18.2598 3 18.1326 3 18V5.5Z" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                      <path d="M10.3636 12L3.2652 18.4732" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                      <path d="M20.7349 18.4732L13.6364 12" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>
                    Email Us
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      
      <Footer />
    </div>
  );
};

const DetailItem = ({ label, value }: { label: string; value: string }) => (
  <div className="bg-gray-50 dark:bg-gray-800 rounded-md p-3">
    <p className="text-sm text-gray-500 dark:text-gray-400 mb-1">{label}</p>
    <p className="font-medium">{value}</p>
  </div>
);

export default CarDetails;
