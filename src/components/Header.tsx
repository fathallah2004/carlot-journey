
import { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';

const Header = () => {
  const [scrolled, setScrolled] = useState(false);
  const location = useLocation();
  
  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 20);
    };
    
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);
  
  return (
    <header className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
      scrolled ? 'py-4 bg-white/80 dark:bg-gray-900/80 shadow-md blur-backdrop' : 'py-6 bg-transparent'
    }`}>
      <div className="container mx-auto px-4 md:px-8 flex items-center justify-between">
        <Link 
          to="/" 
          className="text-2xl font-semibold tracking-tight transition-opacity hover:opacity-80"
        >
          <span className="sr-only">Carlot</span>
          <div className="flex items-center space-x-2">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 7H16.5C17.8807 7 19 8.11929 19 9.5V9.5C19 10.8807 17.8807 12 16.5 12H14V7Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
              <path d="M14 12H16.5C17.8807 12 19 13.1193 19 14.5V14.5C19 15.8807 17.8807 17 16.5 17H14V12Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
              <path d="M4 17V7H8.5C9.88071 7 11 8.11929 11 9.5V9.5C11 10.8807 9.88071 12 8.5 12H4" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
            <span>Carlot</span>
          </div>
        </Link>
        
        <nav className="hidden md:flex items-center space-x-8">
          <NavLink to="/" current={location.pathname === "/"}>Home</NavLink>
          <NavLink to="/inventory" current={location.pathname.includes("/inventory")}>Inventory</NavLink>
          <NavLink to="/about" current={location.pathname === "/about"}>About</NavLink>
          <NavLink to="/contact" current={location.pathname === "/contact"}>Contact</NavLink>
        </nav>
        
        <div className="flex items-center space-x-4">
          <button className="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21 21L15.5 15.5M15.5 15.5C17.0913 13.9087 18 11.7956 18 9.5C18 5.35786 14.6421 2 10.5 2C6.35786 2 3 5.35786 3 9.5C3 13.6421 6.35786 17 10.5 17C12.7956 17 14.9087 16.0913 16.5 14.5L15.5 15.5Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
          </button>
          
          <Link 
            to="/inventory" 
            className="hidden md:inline-flex items-center justify-center px-4 py-2 rounded-md bg-primary text-white hover:bg-primary/90 transition-colors"
          >
            View Cars
          </Link>
          
          <button className="block md:hidden p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
          </button>
        </div>
      </div>
    </header>
  );
};

const NavLink = ({ to, current, children }: { to: string; current: boolean; children: React.ReactNode }) => (
  <Link 
    to={to} 
    className={`relative font-medium transition-colors hover:text-gray-900 dark:hover:text-gray-100 ${
      current ? 'text-gray-900 dark:text-white' : 'text-gray-600 dark:text-gray-400'
    }`}
  >
    {children}
    {current && (
      <span className="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-5 h-0.5 bg-primary rounded-full" />
    )}
  </Link>
);

export default Header;
